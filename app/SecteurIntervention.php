<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecteurIntervention extends Model
{
  protected $fillable = [
      'libelle',
  ];

  public function employes()
  {
      return $this->hasMany(App\Employe::class);
  }
}
