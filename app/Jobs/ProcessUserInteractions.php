<?php
namespace App\Jobs;

use App\Models\Offre;
use App\Models\User;
use App\Models\Recommendation;
use App\Models\UserInteraction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        // 1. Récupérer les interactions de l'utilisateur
        $interactions = UserInteraction::where('user_id', $this->user->id)->get();

        // 2. Analyser les compétences et intérêts de l'utilisateur
        $skills = [];
        foreach ($interactions as $interaction) {
            $offreSkills = $interaction->offre->competence_requis;
            $skills = array_merge($skills, $offreSkills);
        }
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
    }
}
