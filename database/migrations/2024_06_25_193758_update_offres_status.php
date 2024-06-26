<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Mettre à jour les offres qui ont déjà commencé mais ne sont pas encore expirées
    DB::table('offres')
        ->whereNull('etat_offre') // S'assurer qu'on ne met pas à jour les offres déjà définies
        ->whereDate('date_debut_offre', '<=', now())
        ->whereDate('date_fin_offre', '>=', now())
        ->update(['etat_offre' => 'Offre publiée']);

    // Mettre à jour les offres dont la date de fin est passée
    DB::table('offres')
        ->whereNull('etat_offre') // S'assurer qu'on ne met pas à jour les offres déjà définies
        ->whereDate('date_fin_offre', '<', now())
        ->update(['etat_offre' => 'Offre expiré']);

    // Définir par défaut l'état des offres qui ne satisfont aucune condition ci-dessus
    DB::table('offres')
        ->whereNull('etat_offre') // S'assurer qu'on ne met pas à jour les offres déjà définies
        ->update(['etat_offre' => 'En attente']);
}

public function down()
{
    // Ici, vous pouvez ajouter la logique de rollback si nécessaire
    // Par exemple, annuler les mises à jour précédentes ou restaurer les valeurs par défaut
}

};
