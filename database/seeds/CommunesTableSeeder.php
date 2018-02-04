<?php

use Illuminate\Database\Seeder;
use App\Commune;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communesDakar = ['Plateau', 'Medina', 'Fass-Colobane-Gueule Tapee', 'Biscuiterie', 'Dieuppeul Derkle', 'Fann-Point E-Amitie',
                          'Grand Dakar', 'Hann-Bel Air','HLM', 'SICAP Liberte', 'Camberene', 'Grand Yoff', 'Patte D\'Oie',
                          'Parcelles Assainies', 'Mermoz-Sacre Coeur','Ouakam', 'Ngor', 'Yoff', 'Goree'];

        $communesPikine = ['Pikine Ouest', 'Pikine Est', 'Pikine Sud', 'Pikine Nord', 'Dalifort', 'Thiaroye Mer', 'Thiaroye Gare',
                           'Guinaw Rail Nord', 'Guinaw Rail Sud', 'Djidah Thiaroye Kao', 'Diamagueune-Sicap Mbao', 'Diack Sao',
                           'Mbao', 'Keur Massar', 'Malika', 'Yeumbeul Nord', 'Yeumbeul Sud'];

        $communesGuediawaye = ['Golf Sud', 'Medina Gounass', 'Ndiareme Limamoulaye', 'Sam Notaire', 'Wakhinane Nimzatt'];

        $communesRufisque = ['Rufisque Est', 'Rufisque Ouest', 'Rufisque Nord', 'Tivaoune Peul-Niaga', 'Jaxaay Parcelles-Niakoul Rap',
                             'Bambilor', 'Sangalkam','Bargny', 'Diamniadio', 'Sebikhotane', 'Yenne', 'Sendou'];

        foreach ($communesDakar as $commune) {
            Commune::create(
              [
                'libelle' => $commune,
                'departement_id' => 1
              ]
            );
        }
        foreach ($communesPikine as $commune) {
            Commune::create(
              [
                'libelle' => $commune,
                'departement_id' => 2
              ]
            );
        }
        foreach ($communesGuediawaye as $commune) {
            Commune::create(
              [
                'libelle' => $commune,
                'departement_id' => 3
              ]
            );
        }
        foreach ($communesRufisque as $commune) {
            Commune::create(
              [
                'libelle' => $commune,
                'departement_id' => 4
              ]
            );
        }
    }
}
