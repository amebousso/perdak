<?php

use Illuminate\Database\Seeder;
use App\CoordinationDepartementale;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = ['Dakar', 'Pikine', 'Guediawaye', 'Rufisque'];

        foreach ($departements as $departement) {
            CoordinationDepartementale::create(
              [
                  'libelle' => $departement,
                  'pole_id' => 1
              ]
            );
        }
    }

}
