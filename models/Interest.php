<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Interest extends Eloquent {

    /* The database table used by the model. */
    protected $table = 'interests';

    /* The attributes excluded from the model's JSON form. */
    protected $hidden = [];

    /* Attributes that may be filled with Mass Assignment*/
    protected $fillable = [
                'apartment_id',
                'user_id'
                ];
    public static function create(array $attributes, $apartment_id = null, $user_id = null)
    {
        if(array_key_exists('user_id',$attributes))
            foreach($attributes['user_id'] as $id)
            {
                $i = new Interest(['apartment_id'=>$apartment_id,'user_id'=>$id]);
                $i->save();
            }
        $interest = new Interest(['apartment_id'=>$apartment_id,'user_id'=>$user_id]);
        $interest->save();
        return $interest;
    }
    public static function findByIDs($apartment_id,$user_id)
    {
        $interest = Interest::where('apartment_id','=',$apartment_id)
                            ->where('user_id','=',$user_id)->first();
        return $interest;
    }

    public function apartment()
    {
        return $this->belongsTo('Apartment', 'apartment_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

}