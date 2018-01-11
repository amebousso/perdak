<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellule extends Model
{
  protected $fillable = [
      'libelle', 'service_id',
  ];

  public function service()
  {
      return $this->belongsTo('App\Service');
  }

  public function employes()
  {
      return $this->hasMany('App\Employe');
  }
}
