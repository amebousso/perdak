<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpsDeMetier extends Model
{
  protected $fillable = [
      'libelle',
  ];

  public function fonctions()
  {
      return $this->hasMany('App\Fonction');
  }
}
