<?php
/**
 * Created by PhpStorm.
 * User: Linda
 * Date: 07/03/2018
 * Time: 10:28
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{

    protected $fillable = [
        'ligne_name',

    ];

  public function transport(){
      return$this->belongsTo('App\Transport_type');
  }
    public function agence() {
        return $this->belongsTo('App\Agence');
    }

}
