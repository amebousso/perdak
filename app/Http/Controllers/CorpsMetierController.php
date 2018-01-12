<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CorpsDeMetier;

class CorpsMetierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corpsDeMetiers = CorpsDeMetier::all();

        return view('corpsMetier.index', compact('CorpsDeMetier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corpsMetier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $corpsDeMetier = new CorpsDeMetier();
        $corpsDeMetier->libelle = $request->input('libelle');
        $corpsDeMetier->save();

        return redirect()->back()->with('success', 'Corps de metier ajoute avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coprsDeMetier = CorpsDeMetier::find($id);

        return view('corpsMetier.show', compact('corpsMetier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $coprsDeMetier = CorpsDeMetier::find($id);

      return view('corpsMetier.edit', compact('corpsMetier'));
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
      $coprsDeMetier = CorpsDeMetier::find($id);
      $corpsDeMetier->libelle = $request->input('libelle');
      $corpsDeMetier->save();

      return redirect()->back()->with('success', 'Corps de metier mis a jour avec succes');
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
