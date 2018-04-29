<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use PDF;

use App\Adresse;
use App\Employe;
use App\Banque;
use App\InfosBancaire;
use App\Service;
use App\Cellule;
use App\Photo;
use App\CoordinationDePole;
use App\CoordinationDepartementale;
use App\Fonction;
use App\Commune;
use App\Circuit;
use App\DossierPersonnel;
use App\SousDossierPersonnel;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct ()
     {
       $this->middleware('auth')->except('afficherEmploye');
     }

    public function index(Request $request, $type=null)
    {
        $statut = session( 'statut') ? session( 'statut') : '';
        if($statut == 'coordo') {
            if($type ==  'permanent') {
                $employes = Employe::select('*')->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                ->where('communes.departement_id', (int)$request->user()->zone_id)
                                                ->where('employes.type', 'terrain')
                                                ->where('employes.contrat', 'cdi')->orWhere('employes.contrat', 'cdd')
                                                ->paginate(25);
            }else if($type ==  'journalier') {
                $employes = Employe::select('*')->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                ->where('communes.departement_id', (int)$request->user()->zone_id)
                                                ->where('employes.type', 'terrain')
                                                ->where('employes.contrat', 'journalier')
                                                ->paginate(25);
            }else {
                $employes = Employe::select('*')->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                                ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                                ->where('communes.departement_id', (int)$request->user()->zone_id)
                                                ->where('employes.type', 'terrain')
                                                ->paginate(25);
            }
        } else if($statut == 'coordoPole') {
            if($type == 'permanent') {
                $employes = Employe::select('*')->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                       ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                       ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                       ->join('coordination_de_poles', 'coordination_departementales.pole_id', '=', 'coordination_de_poles.id')
                                       ->where('employes.type', 'terrain')
                                       ->where('employes.contrat', 'cdi')->orWhere('employes.contrat', 'cdd')
                                       ->paginate(25);
            } else if($type == 'journalier') {
                $employes = Employe::select('*')->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                     ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                     ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                     ->join('coordination_de_poles', 'coordination_departementales.pole_id', '=', 'coordination_de_poles.id')
                                     ->where('employes.type', 'terrain')
                                     ->where('employes.contrat', 'journalier')
                                     ->paginate(25);
            } else {
                $employes = Employe::select('*')->join('circuits', 'employes.circuit_id', '=', 'circuits.id')
                                   ->join('communes', 'circuits.commune_id', '=', 'communes.id')
                                   ->join('coordination_departementales', 'communes.departement_id', '=', 'coordination_departementales.id')
                                   ->join('coordination_de_poles', 'coordination_departementales.pole_id', '=', 'coordination_de_poles.id')
                                   ->where('employes.type', 'terrain')
                                   ->paginate(25);
            }
        } else{
            if($type == 'administratif') {
                $employes = Employe::where('type', 'support administratif et technique')
                                    ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                    ->paginate(25);
            }
            else if($type == 'permanent') {
                $employes = Employe::where('type', 'terrain')
                                    ->where('contrat', 'cdi')->orWhere('contrat', 'cdd')
                                    ->paginate(25);
            } else if($type == 'journalier') {
                $employes = Employe::where('type', 'terrain')
                                    ->where('contrat', 'journalier')
                                    ->paginate(25);
            } else {
                $employes = Employe::paginate(25);
            }
        }
        $complement = ($type == null) ? '' : ucfirst($type);
        return view('employes.index', compact('employes', 'complement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banques = Banque::all();
        $services = Service::all();
        $poles = CoordinationDePole::all();
        $fonctions = Fonction::all();

        return view('employes.create', compact('banques', 'services', 'poles', 'departementales', 'fonctions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employe = new Employe;
        $photo = new Photo;
        $dossier = new DossierPersonnel;
        /*$infobanque = new InfosBancaire;
        $adresse = new Adresse;*/

        $employe->type = $request->input('type');
        $employe->contrat = $request->input('contrat');
        $employe->prenom = $request->input('prenom');
        $employe->nom = $request->input('nom');
        $employe->dateNaissance = $request->input('dateNaissance');
        $employe->lieuNaissance = $request->input('lieuNaissance');
        $employe->cni = $request->input('cni');
        $employe->sexe = $request->input('sexe');


        $employe->save();

        /*$infobanque->codeGuichet = $request->input('codeGuichet');
        $infobanque->numero_compte = $request->input('numero_compte');
        $infobanque->cleRIB = $request->input('cleRIB');
        $infobanque->banque_id = $request->input('banque');
        $infobanque->employe_id = $employe->id;

        $infobanque->save();

        $adresse->pays = $request->input('pays');
        $adresse->region = $request->input('region');
        $adresse->departement = $request->input('departement');
        $adresse->commune = $request->input('commune');
        $adresse->quartier = $request->input('quartier');
        $adresse->codePostal = $request->input('codePostal');
        $adresse->telephone1 = $request->input('telephone1');
        $adresse->telephone2 = $request->input('telephone2');
        $adresse->telephone3 = $request->input('telephone3');
        $adresse->employe_id = $employe->id;

        $adresse->save();*/

        if ($request->hasFile('photo')) {
              # code...
              $file = $request->file('photo');
              // Making counting of uploaded images
              // start count how many uploaded

              $ext = $file->getClientOriginalExtension();
              $filename = $employe->cni.'.'.$ext;
              $path = public_path('images/employes/profiles/'. $filename);
              $destinationPath = public_path('images/employes/originales/');
              Image::make($file->getRealPath())->resize(240, 240)->save($path);

              $upload_success = $file->move($destinationPath, $filename);
              $imageInfo = @getimagesize($file->getRealPath());

              $photo->url = $filename;
              $photo->extension = $ext;
              $photo->largeur = $imageInfo[1];
              $photo->hauteur = $imageInfo[2];
              $photo->employe_id = $employe->id;

              $photo->save();
          }
          $nomDossier = $employe->cni.'_'. $employe->prenom.'_'.$employe->nom;
          $path = public_path('dossiers/'.$nomDossier);
          File::makeDirectory($path, 0777, true);

          $dossier->libelle = $nomDossier;
          $dossier->employe_id = $employe->id;
          $dossier->save();

        return redirect('/employes')->with('success', 'Personnel ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::find($id);
        //$dossiers = public_path('dossiers/'.$employe->dossierPersonnel->libelle);
        //$files = File::allFiles($dossiers);

        return view('employes.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::find($id);

        if ($employe->infosBancaire) {
          $banques = Banque::all()->pluck('libelle', 'id');
        } else {
          $banques = Banque::all();
        }
        if ($employe->cellule_id) {
          $services = Service::all()->pluck('libelle', 'id');
          $cellules = Cellule::all()->pluck('libelle', 'id');
        } else {
          $services = Service::all();
        }
        if ($employe->circuit_id) {
          $poles = CoordinationDePole::all()->pluck('libelle', 'id');
          $departements = CoordinationDepartementale::all()->pluck('libelle', 'id');
          $communes = Commune::all()->pluck('libelle', 'id');
          $circuits = Circuit::all()->pluck('libelle', 'id');
        } else {
          $poles = CoordinationDePole::all();
        }
        if ($employe->fonction_id) {
          $fonctions = Fonction::all()->pluck('libelle', 'id');
        } else {
          $fonctions = Fonction::all();
        }
        
        return view('employes.edit', compact('employe', 'banques', 'services', 'poles', 'cellules', 'fonctions', 'departements', 'communes', 'circuits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employe = Employe::find($id);
      $infobanque = $employe->infosBancaire; //InfosBancaire::where('employe_id', $id);
      $adresse = $employe->adresse;//Adresse::where('employe_id', $id)->first();
      $photo = $employe->photo; //Photo::where('employe_id', $id)->first();
      $dossier = $employe->dossierPersonnel;//DossierPersonnel::where('employe_id', $id)->first();

      $employe->prenom = $request->input('prenom');
      $employe->nom = $request->input('nom');
      $employe->dateNaissance = $request->input('dateNaissance');
      $employe->lieuNaissance = $request->input('lieuNaissance');
      $employe->matricule = $request->input('matricule');
      $employe->cni = $request->input('cni');
      $employe->profession = $request->input('profession');
      $employe->ipress = $request->input('ipress');
      $employe->sexe = $request->input('sexe');
      $employe->situationMatrimoniale = $request->input('situationMatrimoniale');
      $employe->nombreEnfants = $request->input('nombreEnfants');
      $employe->niveauEtude = $request->input('niveauEtude');
      $employe->fonction_id = $request->input('fonction_id');
      $employe->cellule_id = $request->input('cellule_id');
      $employe->circuit_id = $request->input('circuit_id');

      $employe->save();

      $infobanque->codeGuichet = $request->input('codeGuichet');
      $infobanque->numero_compte = $request->input('numero_compte');
      $infobanque->cleRIB = $request->input('cleRIB');
      $infobanque->banque_id = $request->input('banque');
      $infobanque->employe_id = $employe->id;

      $infobanque->save();

      $adresse->pays = $request->input('pays');
      $adresse->region = $request->input('region');
      $adresse->departement = $request->input('departement');
      $adresse->commune = $request->input('commune');
      $adresse->quartier = $request->input('quartier');
      $adresse->codePostal = $request->input('codePostal');
      $adresse->telephone1 = $request->input('telephone1');
      $adresse->telephone2 = $request->input('telephone2');
      $adresse->telephone3 = $request->input('telephone3');
      $adresse->employe_id = $employe->id;

      $adresse->save();

      /*if ($request->hasFile('photo')) {
            # code...
            $file = $request->file('photo');
            // Making counting of uploaded images
            // start count how many uploaded

            $ext = $file->getClientOriginalExtension();
            $filename = $employe->matricule.'_'.$employe->prenom.'.'.$ext;
            $path = public_path('images/employes/profiles/'. $filename);
            $destinationPath = public_path('images/employes/originales/');
            Image::make($file->getRealPath())->resize(240, 240)->save($path);

            $upload_success = $file->move($destinationPath, $filename);
            $imageInfo = @getimagesize($file->getRealPath());

            $photo->url = $filename;
            $photo->extension = $ext;
            $photo->largeur = $imageInfo[1];
            $photo->hauteur = $imageInfo[2];
            $photo->employe_id = $employe->id;

            $photo->save();
        }

        $nomDossier = $employe->matricule.'_'. $employe->prenom.'_'.$employe->nom;
        $path = public_path('dossiers/'.$nomDossier);
        File::makeDirectory($path, 0777, true);

        $dossier->libelle = $nomDossier;
        $dossier->employe_id = $employe->id;
        $dossier->save();*/

      return redirect('/employes')->with('success', 'Modification enregistrée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sousDossier(Request $request)
    {

      $nomDossier = $request->input('sousdossier');
      $parent = $request->input('dossier');
      $dossier = DossierPersonnel::find($parent);

      $sousD = new SousDossierPersonnel;

      $path = public_path('dossiers/'. $dossier->libelle .'/'. $nomDossier);
      File::makeDirectory($path, 0777, true);

      $sousD->libelle = $nomDossier;
      $sousD->dossierPersonnel_id = $dossier->id;
      $sousD->save();

      return redirect()->back()->with('success', 'Sous dossier créé avec succès');
    }

    public function afficherEmploye($id)
    {
      $employe = Employe::find($id);

      return view('employes.ticket', compact('employe'));
    }

    public function appercuImprimer(Request $request)
    {
      $employes = $request->input('employe');
      $resultats = Employe::whereIn('id', $employes)->get();

      return view('employes.appercu', compact('resultats'));
    }

    public function printPdf(Request $request)
    {
      //if($request->has('download')){
        	// Set extra option
          $resultats = $request->get('employe');
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('employes.appercu', $resultats);
            // download pdf
            return $pdf->download('badge.pdf');
        //}
    }

    public function celluleServices($id)
    {
      # code...
      $cellules = Cellule::all()->where('service_id', $id);

      return response()->json($cellules);
    }

    /*public function fonctionsCorps($id)
    {
      # code...
      $fonctions = Fonction::all()->where('corpsdemetier_id', $id);

      return response()->json($fonctions);
    }*/

    public function departementPoles($id)
    {
      # code...
      $departements = CoordinationDepartementale::select('id', 'libelle')->where('pole_id', $id)->get();

      return response()->json($departements);
    }

    public function communeDepartements($id)
    {
      # code...
      $communes = Commune::select('id', 'libelle')->where('departement_id', $id)->get();

      return response()->json($communes);
    }

    public function circuitCommunes($id)
    {
      # code...
      $circuit = Circuit::all()->where('commune_id', $id);

      return response()->json($circuit);
    }
}
