<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Cellule;

class CelluleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct ()
     {
       $this->middleware('auth');
     }
     
    public function index()
    {
        $cellules =  Cellule::all();

        return view('cellules.index', compact('cellules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('cellules.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cellule = new Cellule;
        $cellule->libelle = $request->input('libelle');
        $cellule->service_id = $request->input('service_id');
        $cellule->save();

        return redirect()->back()->with('success', 'Cellule de service ajoutee avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cellule = Cellule::find($id);

        return view('cellules.show', compact('cellule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cellule = Cellule::find($id);
      $services = Service::all()->pluck('libelle', 'id');

      return view('cellules.edit', compact('cellule', 'services'));
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
      $cellule = Cellule::find($id);
      $cellule->libelle = $request->input('libelle');
      $cellule->service_id = $request->input('service_id');
      $cellule->save();

      return redirect()->back()->with('success', 'Cellule de service mise a jour avec succes');
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
