<?php

use Illuminate\Database\Seeder;
use App\CoordinationDePole;

class PolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poles = ['Dakar', 'Pôle1(Thies)', 'Pôle2(Kaolack - Kaffrine - Fatick)', 'Pôle3(Saint Louis - Matam)',
                  'Pôle4(Diourbel - Louga)', 'Pôle5(Ziguinchor - Kolda - Sedhiou)', 'Pôle6(Tamba - Kedougou)'];

        foreach ($poles as $pole) {
          CoordinationDePole::create(
            [
              'libelle' => $pole
            ]
          );
        }
    }
}
