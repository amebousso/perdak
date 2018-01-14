<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banque;

class BanqueController extends Controller
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
        $banques = Banque::all();
        return view('banques.index', ['banques' => $banques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banque = new Banque;
        $banque->code = $request->input('code');
        $banque->iban = $request->input('iban');
        $banque->libelle = $request->input('libelle');
        $banque->save();

        return redirect()->back()->with('success', 'Banque ajoutee avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('banques.show', ['banque' => Banque::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('banques.edit', ['banque' => Banque::find($id)]);
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
      $banque = Banque::find($id);
      $banque->code = $request->input('code');
      $banque->iban = $request->input('iban');
      $banque->libelle = $request->input('libelle');
      $banque->save();

      return redirect()->back()->with('success', 'Banque mise a jour avec succes');
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
