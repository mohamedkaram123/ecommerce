<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    //

    protected $table = 'mall';
    protected $fillable = [
       'name_ar',
       'name_en',
       'mobile',
       'email',
       'facebook',
       'twitter',
       'website',
       'contact_name',
        'lat',
        'lng',
        'logo',
        'adress',
        'country_id'
    ] ;
}
