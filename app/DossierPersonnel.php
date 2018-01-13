<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DossierPersonnel extends Model
{
  protected $fillable = [
      'libelle', 'employe_id',
  ];

  public function sousDossiers()
  {
      return $this->hasMany('App\SousDossierPersonnel');
  }

  public function employe()
  {
      return $this->belongsTo('App\Employe');
  }
}
