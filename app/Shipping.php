<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Shipping extends Model
{
    //

    
protected $table = 'shipping';
protected $fillable = [
   'name_ar',
   'name_en',
   'adress',
    'lat',
    'lng',
    'logo',
    'user_id',
] ;


public function addbyusername()
{

 return Shipping::hasOne('\App\User','id','user_id');

}

}
