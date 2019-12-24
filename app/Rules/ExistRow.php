<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExistRow implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //

    
        $cites = \App\cites::where('id', $value)->first();
        $contries_id = $cites->contries_id;
         
        if(strval($contries_id) === request('contries_id') ){ 
      
            return true;
      
    }else{
       
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The  city not belong to the country';
    }
}
