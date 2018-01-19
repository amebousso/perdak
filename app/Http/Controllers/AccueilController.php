<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Console\PackageDiscoverCommand;

use App\Adresse;
use App\Employe;
use App\Banque;
use App\InfosBancaire;
use App\Service;
use App\Cellule;
use App\Photo;
use App\CoordinationDePole;
use App\CoordinationDepartementale;
use App\CorpsDeMetier;
use App\Fonction;
use App\Commune;
use App\Circuit;
use App\DossierPersonnel;
use App\SousDossierPersonnel;

class AccueilController extends Controller
{
    public function __construct ()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $nbrEmployesTotal = Employe::count();
      $nbrEmployesCoordination = Employe::count();
      return view('welcome');
    }

    public function quickStat(Request $request)
    {
        $resultat = [];

        $personnelGenre = [];
        $personnelGenreStatut = [];
        $personnelDakar = [];
        if(session('statut') == 'superAdmin' || session('statut') == 'admin') {
            //Stats par genre
            $personnelGenre[0]['label'] = 'Permanents';
            $personnelGenre[0]['value'] = (int) Employe::where('statut', 'permanent')->count();

            $personnelGenre[1]['label'] = 'Journaliers';
            $personnelGenre[1]['value'] = (int) Employe::where('statut', 'journalier')->count();

            //Stats par statut et par genre
            $personnelGenreStatut[0]['y'] = 'Permanents';
            $personnelGenreStatut[0]['a'] = (int) Employe::where('statut', 'permanent')->where('sexe', 'Masculin')->count();
            $personnelGenreStatut[0]['b'] = (int) Employe::where('statut', 'permanent')->where('sexe', 'Feminin')->count();

            $personnelGenreStatut[1]['y'] = 'Journaliers';
            $personnelGenreStatut[1]['a'] = (int) Employe::where('statut', 'journalier')->where('sexe', 'Masculin')->count();
            $personnelGenreStatut[1]['b'] = (int) Employe::where('statut', 'journalier')->where('sexe', 'Feminin')->count();

            //Stats personnel de Dakar par coordination departementale
            $poleDakar = CoordinationDePole::find(1);
            $coordoDepartements = CoordinationDepartementale::where('pole_id', $poleDakar->id)->get();
            $i=0;
            foreach ($coordoDepartements as $departement) {
              $personnelDakar[$i]['y'] = $departement->libelle;
              $personnelDakar[$i]['a'] = (int) Employe::join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                       ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                       ->where('communes.departement_id', $departement->id)
                                                       ->count();
              $i++;
            }
        }else {
          if(session('statut') == 'coordoPole') {
            //Stats par genre
            $personnelGenre[0]['label'] = 'Permanents';
            $personnelGenre[0]['value'] = (int) Employe::where('statut', 'permanent')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                        ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                        ->count();

            $personnelGenre[1]['label'] = 'Journaliers';
            $personnelGenre[1]['value'] = (int) Employe::where('statut', 'journalier')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                        ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                        ->count();

            //Stats par genre et par statut(permanent ou journalier)
            $personnelGenreStatut[0]['y'] = 'Permanents';
            $personnelGenreStatut[0]['a'] = (int) Employe::where('statut', 'permanent')->where('sexe', 'Masculin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
            $personnelGenreStatut[0]['b'] = (int) Employe::where('statut', 'permanent')->where('sexe', 'Feminin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();

            $personnelGenreStatut[1]['y'] = 'Journaliers';
            $personnelGenreStatut[1]['a'] = (int) Employe::where('statut', 'journalier')->where('sexe', 'Masculin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
            $personnelGenreStatut[1]['b'] = (int) Employe::where('statut', 'journalier')->where('sexe', 'Feminin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
          }else {
            //Stats par genre
            $personnelGenre[0]['label'] = 'Permanents';
            $personnelGenre[0]['value'] = (int) Employe::where('statut', 'permanent')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->where('communes.departement_id', $request->user()->departement->id)
                                                        ->count();

            $personnelGenre[1]['label'] = 'Journaliers';
            $personnelGenre[1]['value'] = (int) Employe::where('statut', 'journalier')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->where('communes.departement_id', $request->user()->departement->id)
                                                        ->count();

            //Stats par genre et par statut(permanent ou journalier)
            $personnelGenreStatut[0]['y'] = 'Permanents';
            $personnelGenreStatut[0]['a'] = (int) Employe::where('statut', 'permanent')->where('sexe', 'Masculin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();
            $personnelGenreStatut[0]['b'] = (int) Employe::where('statut', 'permanent')->where('sexe', 'Feminin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();

            $personnelGenreStatut[1]['y'] = 'Journaliers';
            $personnelGenreStatut[1]['a'] = (int) Employe::where('statut', 'journalier')->where('sexe', 'Masculin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();
            $personnelGenreStatut[1]['b'] = (int) Employe::where('statut', 'journalier')->where('sexe', 'Feminin')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();

          }
        }

        $resultat[] = $personnelGenre;
        $resultat[] = $personnelGenreStatut;
        $resultat[] = $personnelDakar;

        return response()->json($resultat);

    }


}
