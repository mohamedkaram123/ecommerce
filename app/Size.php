<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    
    protected $table = 'size';
    protected $fillable = [
       'name_ar',
       'name_en',
      'department_id',
      'is_public'
    ];

     public function departname()
    {
     
     return Size::hasOne('\App\Department','id','department_id');

    }
}
