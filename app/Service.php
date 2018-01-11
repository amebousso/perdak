<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable = [
      'libelle',
  ];

  public function cellules()
  {
      return $this->hasMany('App\Cellule');
  }
}
