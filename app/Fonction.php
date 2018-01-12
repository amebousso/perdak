<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
  protected $fillable = [
      'libelle', 'corpsdemetier_id',
  ];

  public function corpsDeMetier()
  {
      return $this->belongsTo('App\CorpsDeMetier', 'corpsdemetier_id');
  }

  public function employes()
  {
      return $this->hasMany('App\Employe');
  }
}
