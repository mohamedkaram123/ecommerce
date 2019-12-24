<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherMall extends Model
{
    //

    protected $table = 'mall_pro';
    protected $fillable = [

        'product_id',
        'mall_id',
        
    ];
    public function mall(){

        return $this->hasOne('App\Mall','id','mall_id');
      }
}
