<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Contries;

class Cites extends Model
{
    //

    protected $table = 'cites';
protected $fillable =[
    'cites_name_ar',
    'cites_name_en',
    'contries_id',
] ;

public function addbycontries(){
    return Cites::hasOne('App\Contries' , 'id' ,'contries_id');
}
}
