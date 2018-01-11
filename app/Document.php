<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  protected $fillable = [
      'libelle', 'url', 'date', 'sousDossier_id',
  ];

  public function sousDossier()
  {
      return $this->belongsTo('App\SousDossierPersonnel');
  }
}
