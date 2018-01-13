<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $fillable = [
        'pays', 'region', 'departement', 'commune', 'quartier', 'codePostal', 'telephone1', 'telphone2', 'telephone3', 'employe_id',
    ];

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }
}
