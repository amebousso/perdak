<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = [
      'url', 'extension', 'largeur', 'hauteur', 'employe_id',
  ];

  public function employe()
  {
      return $this->hasOne('App\Employe');
  }
}
