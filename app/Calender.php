<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $fillable =[
        'service_name',
        'lundi',
        'mardi',
        'mercredi',
        'jeudi',
        'vendredi',
        'samedi',
        'dimanche',
        'feries'
    ];

}