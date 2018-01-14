<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commune;
use App\Circuit;

class CircuitController extends Controller
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
        $circuits = Circuit::all();

        return view('circuits.index', compact('circuits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = Commune::all();

        return view('circuits.create', compact('communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $circuit = new Circuit;
        $circuit->code = $request->input('code');
        $circuit->libelle = $request->input('libelle');
        $circuit->commune_id = $request->input('commune_id');
        $circuit->save();

        return redirect()->back()->with('success', 'Circuit ajoute avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $circuit = Circuit::find($id);

        return view('circuits.show', compact('circuit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $circuit = Circuit::find($id);
      $communes = Commune::all()->pluck('libelle', 'id');

      return view('circuits.edit', compact('circuit', 'communes'));
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
      $circuit = Circuit::find($id);
      $circuit->code = $request->input('code');
      $circuit->libelle = $request->input('libelle');
      $circuit->commune_id = $request->input('commune_id');
      $circuit->save();

      return redirect()->back()->with('success', 'Circuit ajoute avec succes');
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
