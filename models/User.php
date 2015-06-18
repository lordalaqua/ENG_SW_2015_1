<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

    /* The database table used by the model. */
    protected $table = 'users';

    /* The attributes excluded from the model's JSON form. */
    protected $hidden = [];

    /* Attributes that may be filled with Mass Assignment*/
    protected $fillable = [
            'name',
            'email',
            'password',
            'cpf',
            'phone',
            'number',
            'complement',
            'street',
            'neighbourhood',
            'city',
            'state'
            ];

    public static function create(array $attributes)
    {
        $user = new User($attributes);
        $user->is_admin = false;
        $user->save();
        return $user;
    }

    public static function allClients()
    {
        $users = User::where('is_admin','=',false)->get();
        return $users;
    }

    /* Database Relations */

    public function rentals()
    {
        return $this->hasMany('Rental','user_id');
    }

    public function interests()
    {
        return $this->hasMany('Interest','user_id');
    }

    /* Validation Stuff */

    protected static $errors = [];

    public static function validationErrors()
    {
        return User::$errors;
    }

    public static function validates(array $data)
    {
        User::$errors = [];        

        if(count(User::$errors) > 0)
            return false;
        else
            return true;
    }

    /* Login Functions */

    public static function authenticates( array $data )
    {
        $user = User::where('email','=',$data['email'])->first();
        if($user)
        {
            if($user->password === $data['password'])
                return true;
            else
                return false;
        }
        else
            return false;
    }

    public static function login( array $data )
    {
        $user = User::where('email','=',$data['email'])->first();
        if($user)
        {
            if($user->password === $data['password'])
                return $user;
            else
                return null;
        }
        else
            return null;
    }


}