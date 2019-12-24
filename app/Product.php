<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\File;
class Product extends Model
{
    //

protected $table = 'product';

 protected $fillable =
[
   'title',
   'content',
'photo',
'department_id',  
'trademarkt_id',
'manufact_id',
'mall_id',
'color_id',
'size_id',
'weight_id',
'currancy_id',
'wight',
'price',
'stock',
'other_data',
'status',
'reason',
'end_at',
'start_at',
'end_offer_at',
'start_offer_at',
  'price_offer',
  'size'

];


public function other_data(){

  return $this->hasMany('App\OtherData','product_id','id');
}

public function other_mall(){

  return $this->hasMany('App\OtherMall','mall_id','id');
}

public function files(){

  return $this->hasMany('App\File','relation_id','id')->where('file_type','product');
}



}
