<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoordinationDePole;

class CoordinationPoleController extends Controller
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
        $poles = CoordinationDePole::all();

        return view('coordinationPoles.index', compact('poles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinationPoles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pole = new CoordinationDePole();
        $pole->libelle = $request->input('libelle');
        $pole->save();

        return redirect('/coordinationPoles')->with('success', 'Coordination de Pole ajoutée avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pole = CoordinationDePole::find($id);

        return view('coordinationPoles.show', compact('pole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pole = CoordinationDePole::find($id);

      return view('coordinationPoles.edit', compact('pole'));
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
      $pole = CoordinationDePole::find($id);
      $pole->libelle = $request->input('libelle');
      $pole->save();

      return redirect('/coordinationPoles')->with('success', 'Coordination de Pôle mise à jour avec succès');
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
