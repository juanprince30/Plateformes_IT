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
        
        try {
            // 1. Récupérer les interactions de l'utilisateur
            $interactions = UserInteraction::where('user_id', $this->user->id)->pluck('offre_id');

            
            // 2. Trouver des opportunités pertinentes

            $recommendations = Offre::whereIn('id', $interactions)->get();


            
            // 4. Enregistrer les nouvelles recommandations tout en respectant la limite
            foreach ($recommendations as $offre) {
                if ($this->user->recommendations()->count() >= $this->recommendationLimit) {
                    // Supprimer la recommandation la plus ancienne
                    $this->user->recommendations()->orderBy('created_at')->first()->delete();
                }

                // Vérifier si la recommandation existe déjà avant de l'ajouter
                $existingRecommendation = Recommendation::where('user_id', $this->user->id)
                    ->where('offre_id', $offre->id)
                    ->first();

                if (!$existingRecommendation) {

                    // Enregistrer la nouvelle recommandation
                    Recommendation::create([
                        'user_id' => $this->user->id,                        
                        'offre_id' => $offre->id,
                    ]);
                //     Log::info('Recommendation save : ' . $offre->id);
                }
                else{
                    Log::info('Job recommendation existe for : ' . $offre->id);

                }
            }

        } catch (\Exception $e) {
            Log::error('Error in ProcessUserInteractions job: ' . $e->getMessage());
        }
    }
}
