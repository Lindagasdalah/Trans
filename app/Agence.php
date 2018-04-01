<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable=[
        'agence_name',
         'agence_adresse'
    ];
 

}