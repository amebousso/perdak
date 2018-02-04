<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create(
        [
          'libelle' => 'Administrateur',
          'slug' => 'superAdmin'
        ]
      );
      Role::create(
        [
          'libelle' => 'Coordination Nationale',
          'slug' => 'coordoNat'
        ]
      );
      Role::create(
        [
          'libelle' => 'Service Administratif',
          'slug' => 'admin'
        ]
      );
      Role::create(
        [
          'libelle' => 'Coordination Pôle',
          'slug' => 'coordoPole'
        ]
      );
      Role::create(
        [
          'libelle' => 'Coordination Departementale',
          'slug' => 'coordo'
        ]
      );
    }
}
