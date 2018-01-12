<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commune;
use App\CoordinationDepartementale;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Commune::all();
         return view('communes.index', compact('communes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coordinationDepartements = CoordinationDepartementale::all();

        return view('communes.create', compact('coordinationDepartements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commune = new Commune;
        $commune->libelle = $request->input('libelle');
        $commune->departement_id = $request->input('departement_id');
        $commune->save();

        return redirect()->back()->with('success', 'commune ajoutee avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $commune = Commune::find($id);

      return view('communes.show', compact('commune'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $coordinationDepartements = CoordinationDepartementale::all()->pluck('libelle', 'id');
      $commune = Commune::find($id);

      return view('communes.edit', compact('coordinationDepartements', 'commune'));
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
      $commune = Commune::find($id);
      $commune->libelle = $request->input('libelle');
      $commune->departement_id = $request->input('departement_id');
      $commune->save();

      return redirect()->back()->with('success', 'commune mise a jour avec succes');
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
