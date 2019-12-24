<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Contries extends Model
{
    //

    protected $table = 'contries';
protected $fillable =[
    'country_name_ar',
    'country_name_en',
    'mob',
    'code',
    'logo',
    'currancy',
] ;


public function addbycountry(){
    return $this->hasMany('App\Mall','country_id','id');
}


}
