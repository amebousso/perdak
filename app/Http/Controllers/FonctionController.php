<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fonction;
use App\CorpsDeMetier;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonction::all();

        return view('fonctions.index', compact('fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $corpsMetiers = CorpsDeMetier::all();
        return view('fonctions.create', compact('corpsMetiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fonction = new Fonction;
        $fonction->libelle = $request->input('libelle');
        $fonction->corpsdemetier_id = $request->input('corpsdemetier_id');
        $fonction->save();

        return redirect()->back()->with('success', 'fonction ajoutee avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fonction = Fonction::find($id);

        return view('fonctions.show', compact('fonction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $fonction = Fonction::find($id);
      $corpsDeMetiers = CorpsDeMetier::all()->pluck('libelle', 'id');

      return view('fonctions.edit', compact('fonction', 'corpsDeMetiers'));
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
      $fonction = Fonction::find($id);
      $fonction->libelle = $request->input('libelle');
      $fonction->corpsdemetier_id = $request->input('corpsdemetier_id');
      $fonction->save();

      return redirect()->back()->with('success', 'fonction ajoutee avec succes');
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
