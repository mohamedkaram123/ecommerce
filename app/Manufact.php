<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufact extends Model
{
    //

protected $table = 'manufact';
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
        'adress'
    ] ;
}
