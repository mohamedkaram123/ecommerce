<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
 protected   $table = 'settings';
 protected  $fillable = [
'sitename_en',
'sitename_ar',
'logo',
'icon',
'email',
'main_lang',
'description',
'keywords',
'status',
'message_maintenance',

    ];
}
