<?php

namespace Database\Seeders;

use App\Models\Candidacture;
use App\Models\Categorie;
use App\Models\Offre;
use App\Models\Profil;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        
        
        
        Categorie::factory(3)->create();
    }
}
