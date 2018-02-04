<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create(
        [
          'name' => 'SITIG',
          'email' => 'admin@pngd.org',
          'password' => bcrypt('jepasse12345'),
          'role_id' => 1
        ]
      );
      User::create(
        [
          'name' => 'Coordination Nationale',
          'email' => 'ousmane.ndao@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 2
        ]
      );
      User::create(
        [
          'name' => 'SAMG',
          'email' => 'alioune.gueye@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 3
        ]
      );
      User::create(
        [
          'name' => 'Coordination Pole Dakar',
          'email' => 'mamadou.wade@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 4,
          'zone_id' => 1
        ]
      );
      User::create(
        [
          'name' => 'Coordination Departementale Dakar',
          'email' => 'lamine.kebe@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 5,
          'zone_id' => 1
        ]
      );
      User::create(
        [
          'name' => 'Coordination Departementale Pikine',
          'email' => 'mbayefalle.diallo@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 5,
          'zone_id' => 2
        ]
      );
      User::create(
        [
          'name' => 'Coordination Departementale Rufisque',
          'email' => 'ndiaye.gueye@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 5,
          'zone_id' => 4
        ]
      );
      User::create(
        [
          'name' => 'Coordination Departementale Guediawaye',
          'email' => 'coordo.guedia@pngd.org',
          'password' => bcrypt('jepasse'),
          'role_id' => 5,
          'zone_id' => 3
        ]
      );
    }
}
