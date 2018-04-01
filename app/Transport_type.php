<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 15/02/2018
 * Time: 21:02
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Transport_type extends Model
{
    protected $fillable=[
        'transport_name'
    ];
    public function Transport_type() {
        return $this->belongsTo('App\Transport_type');
    }
}