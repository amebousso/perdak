<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
  protected $fillable = [
      'code', 'libelle', 'commune_id',
  ];

  public function commune()
  {
      return $this->belongsTo('App\Commune');
  }

  public function employes()
  {
      return $this->belongsToMany('App\Employe', 'circuit_employe', 'circuit_id', 'employe_id');
  }
}
