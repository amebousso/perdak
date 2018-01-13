<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoordinationDePole extends Model
{
  protected $fillable = [
      'libelle',
  ];

  public function coordinationDepartements()
  {
      return $this->hasMany('App\CoordinationDepartementale');
  }

  public function users()
  {
      return $this->hasMany(App\User::class);
  }
}
