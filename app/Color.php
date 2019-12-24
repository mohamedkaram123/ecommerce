<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //

    protected $table = 'color';
    protected $fillable = [
       'name_ar',
       'name_en',
       'color'
    ];
}