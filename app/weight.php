<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weight extends Model
{
    //

    
    protected $table = 'weight';
    protected $fillable = [
       'name_ar',
       'name_en',
    
    ];
}
