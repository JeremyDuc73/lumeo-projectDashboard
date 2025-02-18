<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DossierSection;

class DossierSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            'Introduction',
            'Présentation du titre professionnel',
            'Vue synoptique des activités et compétences professionnelles',
            'Projet personnel : Lumeo',
            'Projet en entreprise',
            'Compétences développées et validation du titre RNCP',
            'Démarches et outils utilisés',
            'Analyse critique et perspectives professionnelles',
            'Conclusion',
            'Annexes',
        ];

        foreach ($sections as $section) {
            DossierSection::create([
                'title' => $section,
                'progress' => 0, // Initialisation à 0%
            ]);
        }
    }
}

