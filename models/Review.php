<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Review extends Eloquent {

    /* The database table used by the model. */
    protected $table = 'reviews';

    /* The attributes excluded from the model's JSON form. */
    protected $hidden = [];

    /* Attributes that may be filled with Mass Assignment*/
    protected $fillable = ['review'];

    public function apartment()
    {
        return $this->belongsToOne('Apartment', 'apartment_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
}