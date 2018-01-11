<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
  protected $fillable = [
      'prenom', 'nom', 'dateNaissance', 'lieuNaissance', 'matricule', 'cni', 'profession', 'ipress', 'sexe', 'situationMatrimoniale', 'nombreEnfants', 'niveauEtude', 'fonction_id', 'cellule_id',
  ];

  public function adresse()
  {
      return $this->hasOne('App\Adresse', 'employe_id');
  }

  public function dossierPersonnel()
  {
      return $this->hasOne('App\DossierPersonnel', 'employe_id');
  }

  public function infosBancaire()
  {
      return $this->hasOne('App\InfosBancaire', 'employe_id');
  }

  public function photo()
  {
      return $this->hasOne('App\Photo', 'employe_id');
  }

  public function cellule()
  {
      return $this->belongsTo('App\Cellule');
  }

  public function fonction()
  {
      return $this->belongsTo('App\Fonction');
  }

  public function circuits()
  {
      return $this->belongsToMany('App\Circuit', 'circuit_employe', 'circuit_id', 'employe_id');
  }
}
