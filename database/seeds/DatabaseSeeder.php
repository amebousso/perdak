<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PolesTableSeeder::class);
        $this->call(DepartementsTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(FonctionsTableSeeder::class);
        $this->call(BanquesTableSeeder::class);
    }
}
