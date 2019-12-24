<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Contries;
use App\Cites;

class State extends Model
{
    //

    protected $table = 'state';
protected $fillable =[
    'state_name_ar',
    'state_name_en',
    'contries_id',
    'cites_id',
] ;

public function addbycontries(){
    return State::hasOne('App\Contries' , 'id' ,'contries_id');
}

public function addbycites(){
    return State::hasOne('App\Cites' , 'id' ,'cites_id');
}
}
