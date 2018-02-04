<?php

use Illuminate\Database\Seeder;
use App\Fonction;

class FonctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fonctions = ['Coordonnateur National', 'Coordonnateur de Pole', 'Coordonnateur Departemental', 'Responsable Administratif',
                     'Responsable Financier', 'Responsable Technique', 'Responsable Cellule', 'Responsable SI', 'Responsable SIG',
                     'Contrôleur Interne', 'Comptable','Assistant Direction', 'Assistant Technique', 'Assistant suivi', 'Assistant RH',
                     'Architecte Logiciel', 'Architecte Reseaux', 'Technicien de Surface', 'CST', 'Inspecteur', 'Geomaticien',
                     'Chef Parc Automobile', 'Chauffeur', 'Ambassadrice', 'Vigile', 'Photographe', 'Cameraman-Monteur', 'Cadre Gestion'];

        foreach ($fonctions as $fonction) {
            Fonction::create(
              [
                'libelle' => $fonction
              ]
            );
        }
    }
}
