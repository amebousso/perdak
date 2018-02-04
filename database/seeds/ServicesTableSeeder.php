<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $services = ['Cabinet', 'Service Finances et Comptabilite', 'Service Administratif et Moyens Generaux', 'Service Technique',
                   'Service Economie et Valorisation des Dechets'];

      foreach ($services as $service) {
        Service::create(
          [
            'libelle' => $service
          ]
        );
      }
    }
}
