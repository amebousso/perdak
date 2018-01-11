<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    protected $fillable = [
        'code', 'iban', 'libelle',
    ];
    
    public function infosbancaires()
    {
        return $this->hasMany('App\InfosBancaire');
    }
}
