<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index', compact('employes'));
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
        $departementales = CoordinationDepartementale::all();
        $corps = CorpsDeMetier::all();

        return view('employes.create', compact('banques', 'services', 'poles', 'departementales', 'corps'));
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
        $infobanque = new InfosBancaire;
        $adresse = new Adresse;

        $employe->prenom = $request->input('prenom');
        $employe->nom = $request->input('nom');
        $employe->dateNaissance = $request->input('dateNaissance');
        $employe->lieuNaissance = $request->input('lieuNaissance');
        $employe->matricule = $request->input('matricule');
        $employe->cni = $request->input('cni');
        $employe->professeion = $request->input('professeion');
        $employe->ipress = $request->input('ipress');
        $employe->sexe = $request->input('sexe');
        $employe->situationMatrimoniale = $request->input('situationMatrimoniale');
        $employe->nombreEnfants = $request->input('nombreEnfants');
        $employe->niveauEtude = $request->input('niveauEtude');
        $employe->fonction_id = $request->input('fonction_id');
        $employe->cellule_id = $request->input('cellule_id');

        $employe->save();

        $infobanque->code_guichet = $request->input('code_guichet');
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

        return redirect()->back()->with('success', 'Personnel ajouté avec succès');
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
        $adresse = Adresse::where('employe_id', $id);
        $infobanque = InfosBancaire::where('employe_id', $id);
        return view('employe.show', compact('employe', 'adresse', 'infobanque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
