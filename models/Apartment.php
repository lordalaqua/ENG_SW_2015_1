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

    public static function create(array $attributes)
    {
        $old = Apartment::where('street','=',$attributes['street'])
                    ->where('number','=',$attributes['number'])
                    ->where('complement','=',$attributes['complement'])
                    ->where('neighbourhood','=',$attributes['neighbourhood'])
                    ->where('city','=',$attributes['city'])
                    ->where('state','=',$attributes['state'])->first();
        if($old === null)
        {
            $apartment = new Apartment($attributes);
            $apartment->approved = false;
            $apartment->available = false;
            $apartment->save();
        }
        else
        {
            $apartment = $old;
        }
        if(array_key_exists('review',$attributes))
        {
            $review = new Review($attributes);
            $review->user_id = $_SESSION['logged_id'];
            $apartment->reviews()->save($review);
        }
        return $apartment;
    }

    public static function allSuggested()
    {
        $apartments = Apartment::where('approved','=',false)->get();
        return $apartments;
    }

    public static function findSuggested($id)
    {
        $apartment = Apartment::where('approved','=',false)->find($id);
        return $apartment;
    }

    public static function allAvailable()
    {
        $apartments = Apartment::where('available','=',true)->get();
        return $apartments;
    }

    public static function findAvailable($id)
    {
        $apartment = Apartment::where('available','=',true)->find($id);
        return $apartment;
    }

    public function approve()
    {
        $this->approved = true;
        $this->available = true;
        $this->save();
    }

    public function getAvailableAttribute($value)
    {
        if($this->approved)
            return $value;
        else
            return false;
    }

    /* Database Relations */
    public function reviews()
    {
        return $this->hasMany('Review','apartment_id');
    }

    public function rentals()
    {
        return $this->hasMany('Rental','apartment_id');
    }

    public function interests()
    {
        return $this->hasMany('Interest','apartment_id');
    }


    /* Validation Stuff */

    protected static $errors = [];

    public static function validationErrors()
    {
        return Apartment::$errors;
    }

    public static function validates(array $data)
    {
        Apartment::$errors = [];

        if( ! array_key_exists('street',$data) || empty($data['street']))
            Apartment::$errors['street'] = 'Rua';

        if( ! array_key_exists('number',$data) || $data['number'] <= 0)
            Apartment::$errors['number'] = 'Número';

        if( ! array_key_exists('neighbourhood',$data) || empty($data['neighbourhood']))
            Apartment::$errors['neighbourhood'] = 'Bairro';

        if( ! array_key_exists('city',$data) || empty($data['city']))
            Apartment::$errors['city'] = 'Cidade';

        if( ! array_key_exists('state',$data) || empty($data['state']))
            Apartment::$errors['state'] = 'Estado';

        if( ! array_key_exists('room_total',$data) || 
            ($data['room_total'] <= 0 && 10 < $data['room_total']))
            Apartment::$errors['room_total'] = 'Número de Quartos';

        if( ! array_key_exists('num_bathrooms',$data) || 
            ($data['num_bathrooms'] <= 0 && 10 < $data['num_bathrooms']))
            Apartment::$errors['num_bathrooms'] = 'Número de Banheiros';

        if( ! array_key_exists('num_garages',$data) || 
            ($data['num_garages'] < 0 && 10 < $data['num_garages'] ))
            Apartment::$errors['num_garages'] = 'Vagas de Garagem';

        if( ! array_key_exists('campi_logistics',$data) ||
            ($data['campi_logistics'] <= 0 && 5 < $data['campi_logistics']))
            Apartment::$errors['campi_logistics'] = 'Logística de Acesso aos Campi';

        if( ! array_key_exists('service_availability',$data) ||
            ($data['service_availability'] <= 0 && 5 < $data['service_availability']))
            Apartment::$errors['service_availability'] = 'Disponibilidade de Serviços';

        if( ! array_key_exists('comfort',$data) ||
            ($data['comfort'] <= 0 && 5 < $data['comfort']))
            Apartment::$errors['comfort'] = 'Conforto';

        if(count(Apartment::$errors) > 0)
            return false;
        else
            return true;
    }


}