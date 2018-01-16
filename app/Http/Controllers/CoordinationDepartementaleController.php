<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoordinationDepartementale;
use App\CoordinationDePole;

class CoordinationDepartementaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct ()
     {
       $this->middleware('admin');
     }

    public function index()
    {
        $coordinationDepartements = CoordinationDepartementale::all();

        return view('coordinationDepartementales.index', compact('coordinationDepartements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poles = CoordinationDePole::all();

        return view('coordinationDepartementales.create', compact('poles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coordinationDepartement = new CoordinationDepartementale();
        $coordinationDepartement->libelle = $request->input('libelle');
        $coordinationDepartement->pole_id = $request->input('pole_id');

        $coordinationDepartement->save();

        return redirect('/coordinationDepartementales')->with('success', 'Coordination departementale ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordinationDepartement = CoordinationDepartementale::find($id);

        return view('coordinationDepartementales.show', compact('coordinationDepartement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $coordinationDepartement = CoordinationDepartementale::find($id);
      $poles = CoordinationDePole::all()->pluck('libelle', 'id');

      return view('coordinationDepartementales.edit', compact('coordinationDepartement', 'poles'));
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
      $coordinationDepartement = CoordinationDepartementale::find($id);
      $coordinationDepartement->libelle = $request->input('libelle');
      $coordinationDepartement->pole_id = $request->input('pole_id');

      $coordinationDepartement->save();

      return redirect('/coordinationDepartementales')->with('success', 'Coordination departementale mise à jour avec succès');
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
