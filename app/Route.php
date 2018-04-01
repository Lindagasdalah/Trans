<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 15/02/2018
 * Time: 20:50
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [

        'route_name',
        'route_color',
         'coordonne',
    ];
    public function ligne() {
        return $this->belongsTo('App\Ligne');
    }
}