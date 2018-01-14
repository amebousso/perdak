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
use App\DossierPersonnel;
use App\SousDossierPersonnel;

class AccueilController extends Controller
{
    public function __construct ()
    {
      $this->middleware('auth');
    }

    public function index()
    {

      return view('welcome');
    }
}
