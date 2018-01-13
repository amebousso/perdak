<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoordinationDepartementale extends Model
{
  protected $fillable = [
      'libelle', 'pole_id',
  ];

  public function coordinationPole()
  {
      return $this->belongsTo('App\CoordinationDePole', 'pole_id');
  }

  public function communes()
  {
      return $this->hasMany('App\Commune');
  }

  public function users()
  {
      return $this->hasMany(App\User::class);
  }
}
