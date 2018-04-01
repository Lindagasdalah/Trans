<?php
/**
 * Created by PhpStorm.
 * User: sana
 * Date: 09/03/2018
 * Time: 10:20
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feries extends Model
{

    protected $fillable=[
        'ferie_name',
        'ferie_date'
    ];
    public function feries() {
        return $this->belongsTo('App\Feries');
    }
}