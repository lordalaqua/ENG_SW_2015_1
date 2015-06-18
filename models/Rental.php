<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rental extends Eloquent {

    /* The database table used by the model. */
    protected $table = 'rentals';

    /* The attributes excluded from the model's JSON form. */
    protected $hidden = [];

    /* Attributes that may be filled with Mass Assignment*/
    protected $fillable = [
                'apartment_id',
                'user_id',
                'duration',
                'price'
                ];

    public function apartment()
    {
        return $this->belongsTo('Apartment', 'apartment_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    /* Validation Stuff */

    protected static $errors = [];

    public static function validationErrors()
    {
        return Rental::$errors;
    }

    public static function validates(array $data)
    {
        Rental::$errors = [];        

        if(count(Rental::$errors) > 0)
            return false;
        else
            return true;
    }


}