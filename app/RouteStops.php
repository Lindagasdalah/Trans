<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 07/03/2018
 * Time: 10:28
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class RouteStops extends Model
{

    protected $fillable=[
        'ordre',
        //route_id
        //stop_id
    ];

    public function route() {
        return $this->belongsTo('App\Route');
    }
    public function stop() {
        return $this->belongsTo('App\Stop');
    }
}