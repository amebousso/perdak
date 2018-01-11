<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
  protected $fillable = [
      'libelle', 'departement_id',
  ];

  public function coordinationDepartement()
  {
      return $this->belongsTo('App\CoordinationDepartementale');
  }

  public function circuits()
  {
      return $this->hasMany('App\Circuit');
  }
}
