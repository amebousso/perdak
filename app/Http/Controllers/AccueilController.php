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
        $personnelTerrainDakar = [];

        if(session('statut') == 'superAdmin' || session('statut') == 'admin' || session('statut') == 'coordoNat') {
            //Stats par genre
            $personnelGenre[0]['label'] = 'Personnel Administratif, Technique';
            $personnelGenre[0]['value'] = (int) Employe::where('type', 'support administratif et technique')->count();

            $personnelGenre[1]['label'] = 'Personnel Terrain permanent';
            $personnelGenre[1]['value'] = (int) Employe::where('type', 'terrain')
                                                        ->where('contrat', 'cdi')->orwhere('contrat', 'cdd')
                                                        ->count();

            $personnelGenre[2]['label'] = 'Personnel Terrain Journalier';
            $personnelGenre[2]['value'] = (int) Employe::where('type', 'terrain')
                                                        ->where('contrat', 'journalier')
                                                        ->count();

            //Stats par statut et par genre
            $personnelGenreStatut[0]['y'] = 'Personnel Administratif, Technique';
            $personnelGenreStatut[0]['a'] = (int) Employe::where('type', 'support administratif et technique')->where('sexe', 'M')->count();
            $personnelGenreStatut[0]['b'] = (int) Employe::where('type', 'support administratif et technique')->where('sexe', 'F')->count();

            $personnelGenreStatut[1]['y'] = 'Personnel Terrain Permanent';
            $personnelGenreStatut[1]['a'] = (int) Employe::where('type', 'terrain')
                                                          ->where('sexe', 'M')
                                                          ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                          ->count();
            $personnelGenreStatut[1]['b'] = (int) Employe::where('type', 'terrain')
                                                          ->where('sexe', 'F')
                                                          ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                          ->count();

            $personnelGenreStatut[2]['y'] = 'Personnel Terrain Journalier';
            $personnelGenreStatut[2]['a'] = (int) Employe::where('type', 'terrain')
                                                          ->where('sexe', 'M')
                                                          ->where('contrat', 'journalier')
                                                          ->count();
            $personnelGenreStatut[2]['b'] = (int) Employe::where('type', 'terrain')
                                                          ->where('sexe', 'F')
                                                          ->where('contrat', 'journalier')
                                                          ->count();

            $poleDakar = CoordinationDePole::find(1);
            $coordoDepartements = CoordinationDepartementale::where('pole_id', $poleDakar->id)->get();
            $i=0;
            foreach ($coordoDepartements as $departement) {
              //Stats personnel de Dakar par coordination departementale
              $personnelDakar[$i]['y'] = $departement->libelle;
              $personnelDakar[$i]['a'] = (int) Employe::join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                       ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                       ->where('communes.departement_id', $departement->id)
                                                       ->count();

              $personnelTerrainDakar[$i]['y'] = $departement->libelle;
              $personnelTerrainDakar[$i]['a'] = (int) Employe::where('employes.type', 'terrain')
                                                              ->whereIn('contrat', ['cdd', 'cdi'])
                                                              ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                              ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                              ->where('communes.departement_id', $departement->id)
                                                              ->count();
              $personnelTerrainDakar[$i]['b'] = (int) Employe::where('employes.type', 'terrain')
                                                              ->where('contrat', 'journalier')
                                                              ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                              ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                              ->where('communes.departement_id', $departement->id)
                                                              ->count();
              /*$circuitDakar[$i]['y'] = $departement->libelle;
              $circuitDakar[$i]['a'] = (int) Circuit::where('type', 'balayage')
                                                      ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                      ->where('communes.departement_id', $departement->id)
                                                      ->count();
              $circuitDakar[$i]['b'] = (int) Circuit::where('type', 'collecte')
                                                      ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                      ->where('communes.departement_id', $departement->id)
                                                      ->count();*/
              $i++;
            }
        }else {
          if(session('statut') == 'coordoPole') {
            //Stats par genre
            $personnelGenre[0]['label'] = 'Personnel Administratif, Technique';
            $personnelGenre[0]['value'] = (int) Employe::where('type', 'support administratif ou technique')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                        ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                        ->count();

            $personnelGenre[1]['label'] = 'Personnel Terrain Permanent';
            $personnelGenre[1]['value'] = (int) Employe::where('type', 'terrain')
                                                        ->where('contrat', 'cdi')->orwhere('contrat', 'cdd')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                        ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                        ->count();

            $personnelGenre[2]['label'] = 'Personnel Terrain Journalier';
            $personnelGenre[2]['value'] = (int) Employe::where('type', 'terrain')
                                                        ->where('contrat', 'journalier')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                        ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                        ->count();

            //Stats par genre et par statut(permanent ou journalier)
            $personnelGenreStatut[0]['y'] = 'Personnel Administratif, Technique';
            $personnelGenreStatut[0]['a'] = (int) Employe::where('type', 'support administratif et technique')->where('sexe', 'M')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
            $personnelGenreStatut[0]['b'] = (int) Employe::where('type', 'support administratif et technique')->where('sexe', 'F')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();

            $personnelGenreStatut[1]['y'] = 'Personnel Terrain Permanent';
            $personnelGenreStatut[1]['a'] = (int) Employe::where('type', 'terrain')->where('sexe', 'M')
                                                          ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
            $personnelGenreStatut[1]['b'] = (int) Employe::where('type', 'terrain')->where('sexe', 'F')
                                                          ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();

            $personnelGenreStatut[2]['y'] = 'Personnel Terrain Journalier';
            $personnelGenreStatut[2]['a'] = (int) Employe::where('type', 'terrain')->where('sexe', 'M')
                                                          ->where('contrat', 'journalier')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
            $personnelGenreStatut[2]['b'] = (int) Employe::where('type', 'terrain')->where('sexe', 'F')
                                                          ->where('contrat', 'journalier')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                                          ->where('coordination_departementales.pole_id', $request->user()->departement->pole->id)
                                                          ->count();
          }else {
            //Stats par genre
            $personnelGenre[0]['label'] = 'Personnel Administratif, Technique';
            $personnelGenre[0]['value'] = (int) Employe::where('type', 'support administratif et technique')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->where('communes.departement_id', $request->user()->departement->id)
                                                        ->count();

            $personnelGenre[1]['label'] = 'Personnel Terrain Permanent';
            $personnelGenre[1]['value'] = (int) Employe::where('type', 'terrain')
                                                        ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->where('communes.departement_id', $request->user()->departement->id)
                                                        ->count();

            $personnelGenre[2]['label'] = 'Personnel Terrain Journalier';
            $personnelGenre[2]['value'] = (int) Employe::where('type', 'terrain')
                                                        ->where('contrat', 'journalier')
                                                        ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                        ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                        ->where('communes.departement_id', $request->user()->departement->id)
                                                        ->count();

            //Stats par genre et par statut(permanent ou journalier)
            $personnelGenreStatut[0]['y'] = 'Personnel Administratif, Technique';
            $personnelGenreStatut[0]['a'] = (int) Employe::where('type', 'support administratif et technique')->where('sexe', 'M')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();
            $personnelGenreStatut[0]['b'] = (int) Employe::where('type', 'support administratif et technique')->where('sexe', 'F')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();

            $personnelGenreStatut[1]['y'] = 'Personnel Terrain Permanent';
            $personnelGenreStatut[1]['a'] = (int) Employe::where('type', 'terrain')->where('sexe', 'M')
                                                          ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();
            $personnelGenreStatut[1]['b'] = (int) Employe::where('type', 'terrain')->where('sexe', 'F')
                                                          ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();

            $personnelGenreStatut[2]['y'] = 'Personnel Terrain Journalier';
            $personnelGenreStatut[2]['a'] = (int) Employe::where('employes.type', 'terrain')->where('sexe', 'M')
                                                          ->where('contrat', 'journalier')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();
            $personnelGenreStatut[2]['b'] = (int) Employe::where('employes.type', 'terrain')->where('sexe', 'F')
                                                          ->where('contrat', 'journalier')
                                                          ->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                          ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                          ->where('communes.departement_id', $request->user()->departement->id)
                                                          ->count();

          }
        }

        $resultat[] = $personnelGenre;
        $resultat[] = $personnelGenreStatut;
        $resultat[] = $personnelDakar;
        $resultat[] = $personnelTerrainDakar;

        return response()->json($resultat);

    }

    public function recherche(Request $request)
    {
      $word = $request->get('q');
      $employes = Employe::where('prenom', 'like', '%'.$request->get('q').'%')
                            ->orwhere('nom', 'like', '%'.$request->get('q').'%')
                            ->orwhere('cni', 'like', '%'.$request->get('q').'%')
                            ->orwhere('type', 'like', '%'.$request->get('q').'%')
                            ->orwhere('matricule', 'like', '%'.$request->get('q').'%')
                            ->paginate(45);

      return view('recherche', compact('employes', 'word'));//response()->json($personnels);
    }
}
