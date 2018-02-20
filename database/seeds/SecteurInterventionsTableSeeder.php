<?php

use Illuminate\Database\Seeder;
use App\SecteurIntervention;

class SecteurInterventionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secteurs = ['Balayage', 'Collecte', 'Polyvalent', 'Surveillance Depot'];

        foreach ($secteurs as $secteur) {
            SecteurIntervention::create(
              [
                  'libelle' => $secteur
              ]
            );
        }
    }
}
