<?php
namespace App\Jobs;

use App\Models\Competence;
use App\Models\Offre;
use App\Models\Profil;
use App\Models\User;
use App\Models\Recommendation;
use App\Models\UserInteraction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessUserInteractions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $recommendationLimit = 20; // Limite des recommandations


    /**
     * Create a new job instance.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Log::info('Job ProcessUserInteractions started for user: ' . $this->user->id);

        try {

        // 1. Récupérer les interactions de l'utilisateur
        $interactions = UserInteraction::where('user_id', $this->user->id)->get();

        // 2. Analyser les compétences et intérêts de l'utilisateur
        $skills = [];
        foreach ($interactions as $interaction) {
            $offreSkills = $interaction->offre->competence_requis;
            $skills = array_merge($skills, $offreSkills);
        }

        // Ajouter les compétences de l'utilisateur à la liste des compétences analysées
        $userSkills = Competence::where('user_id', $this->user->id)->pluck('titre')->toArray();
        $skills = array_merge($skills, $userSkills);


        $uniqueSkills = array_unique($skills);

        // 3. Trouver des opportunités pertinentes
        $recommendations = Offre::where(function ($query) use ($uniqueSkills) {
            foreach ($uniqueSkills as $skill) {
                $query->orWhereJsonContains('competence_requis', $skill);
            }
        })->get();

       // 4. Ajouter les nouvelles recommandations tout en respectant la limite
       foreach ($recommendations as $offre) {
        // Vérifier si la limite est atteinte
        if ($this->user->recommendations()->count() >= $this->recommendationLimit) {
            // Supprimer la recommandation la plus ancienne
            $this->user->recommendations()->orderBy('created_at')->first()->delete();
            }
        }


        // 5. Enregistrer les nouvelles recommandations
        foreach ($recommendations as $offre) {
            Recommendation::create([
                'user_id' => $this->user->id,
                'offre_id' => $offre->id,
            ]);
        }
        Log::info('Job ProcessUserInteractions completed for user: ' . $this->user->id);
    } catch (\Exception $e) {
        Log::error('Error in ProcessUserInteractions job: ' . $e->getMessage());
    }
    }
}
