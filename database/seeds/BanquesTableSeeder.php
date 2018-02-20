<?php

use Illuminate\Database\Seeder;
use App\Banque;

class BanquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banques = [
          ['code' => 'SN010', 'libelle' => 'BICIS' ],
          ['code' => 'SN011', 'libelle' => 'SGBS' ],
          ['code' => 'SN012', 'libelle' => 'CBAO' ],
          ['code' => 'SN039', 'libelle' => 'BHS' ],
          ['code' => 'SN048', 'libelle' => 'CNCAS' ],
          ['code' => 'SN060', 'libelle' => 'CREDIT DU SENEGAL' ],
          ['code' => 'SN079', 'libelle' => 'BIS' ],
          ['code' => 'SN094', 'libelle' => 'ECOBANK' ],
          ['code' => 'SN100', 'libelle' => 'BOA' ],
          ['code' => 'SN111', 'libelle' => 'BSIC' ],
          ['code' => 'SN117', 'libelle' => 'BIMAO' ],
          ['code' => 'SN137', 'libelle' => 'BAS' ],
          ['code' => 'SN140', 'libelle' => 'ICB' ],
          ['code' => 'SN141', 'libelle' => 'CITIBANK' ],
          ['code' => 'SN144', 'libelle' => 'BRM' ],
          ['code' => 'SN153', 'libelle' => 'UBA' ],
          ['code' => 'SN156', 'libelle' => 'CREDIT INTERNATIONAL' ],
          ['code' => 'SN159', 'libelle' => 'DIAMOND BANK' ],
          ['code' => 'SN175', 'libelle' => 'ORABANK' ],
          ['code' => 'SN189', 'libelle' => 'BGFIBANK' ],
          ['code' => 'SN191', 'libelle' => 'BDK' ]
        ];

        foreach ($banques as $col => $ligne) {
            Banque::create([
              'code' => $ligne['code'],
              'libelle' => $ligne['libelle']
            ]);
        }
    }
}
