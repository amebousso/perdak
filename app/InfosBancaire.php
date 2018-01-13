<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfosBancaire extends Model
{
  protected $fillable = [
      'codeGuichet', 'numero_compte', 'cleRIB', 'banque_id', 'employe_id',
  ];

  public function banque()
  {
      return $this->belongsTo('App\Banque');
  }

  public function employe()
  {
      return $this->belongsTo('App\Employe');
  }
}
