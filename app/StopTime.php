<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 15/02/2018
 * Time: 21:31
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class StopTime extends Model
{
    protected $fillable=[
        'arrived_time',
        'departure_time',
        /*'trip_id',
          'routeStop_id'*/
    ];

    public function trip() {
        return $this->belongsTo('App\Trip');
    }
    public function routeStop() {
        return $this->belongsTo('App\RouteStops');
    }
}