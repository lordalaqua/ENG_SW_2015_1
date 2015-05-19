<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Apartment extends Eloquent {

    /* The database table used by the model. */
    protected $table = 'apartments';

    /* The attributes excluded from the model's JSON form. */
    protected $hidden = [];

    /* Attributes that may be filled with Mass Assignment*/
    protected $fillable = [
            'number',
            'complement',
            'street',
            'neighbourhood',
            'city',
            'state',
            'num_bathrooms',
            'num_garages',
            'other_info',
            'campi_logistics',
            'service_availability',
            'comfort',
            'room_total',
            'approved'];

    protected $errors = [];

    public function reviews()
    {
        return $this->hasMany('Review','apartment_id');
    }

    public function validate(array $data)
    {
        $this->errors = [];

        if( ! array_key_exists('street',$data) || empty($data['street']))
            $this->errors['street'] = true;

        if( ! array_key_exists('number',$data) || $data['number'] <= 0)
            $this->errors['number'] = true;

        if( ! array_key_exists('neighbourhood',$data) || empty($data['neighbourhood']))
            $this->errors['neighbourhood'] = true;

        if( ! array_key_exists('city',$data) || empty($data['city']))
            $this->errors['city'] = true;

        if( ! array_key_exists('state',$data) || empty($data['state']))
            $this->errors['state'] = true;

        if( ! array_key_exists('room_total',$data) || 
            ($data['room_total'] <= 0 && 10 < $data['room_total']))
            $this->errors['room_total'] = true;

        if( ! array_key_exists('num_bathrooms',$data) || 
            ($data['num_bathrooms'] <= 0 && 10 < $data['num_bathrooms']))
            $this->errors['num_bathrooms'] = true;

        if( ! array_key_exists('num_garages',$data) || 
            ($data['num_garages'] < 0 && 10 < $data['num_garages'] ))
            $this->errors['num_garages'] = true;

        if( ! array_key_exists('campi_logistics',$data) ||
            ($data['campi_logistics'] <= 0 && 5 < $data['campi_logistics']))
            $this->errors['campi_logistics'] = true;

        if( ! array_key_exists('service_availability',$data) ||
            ($data['service_availability'] <= 0 && 5 < $data['service_availability']))
            $this->errors['service_availability'] = true;

        if( ! array_key_exists('comfort',$data) ||
            ($data['comfort'] <= 0 && 5 < $data['comfort']))
            $this->errors['comfort'] = true;

        if(count($this->errors) > 0)
            return false;
        else
            return true;
    }


}