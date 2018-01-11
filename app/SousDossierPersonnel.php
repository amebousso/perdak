<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousDossierPersonnel extends Model
{
  protected $fillable = [
      'libelle', 'dossierPersonnel_id',
  ];

  public function dossierPersonnel()
  {
      return $this->belongsTo('App\DossierPersonnel');
  }

  public function documents()
  {
      return $this->hasMany('App\Document');
  }
}
