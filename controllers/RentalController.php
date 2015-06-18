<?php

class RentalController {

    public function index()
    {
        $rentals = Rental::all();
        require __DIR__ . '/../views/RentalListView.php';
    }

    public function selectApartment()
    {
        $apartments = Apartment::allAvailable();
        require __DIR__ . '/../views/RentalApartmentListView.php';
    }

    public function selectUser($apartment_id)
    {
        $users = User::allClients();
        // remove current user not handled yet
        require __DIR__ . '/../views/RentalUserListView.php';   
    }

    public function create($apartment_id,$user_id)
    {
        require __DIR__ . '/../views/RentalCreateView.php';
    }

    public function store($apartment_id,$user_id)
    {
        if(Rental::validates($_POST))
        {
            $data = array_merge($_POST,['apartment_id'=>$apartment_id,'user_id'=>$user_id]);
            $rental = Rental::create($data);
            header("Location: /rentals/".$rental->id);
            die();
        }
        else
        {
            $errors = Rental::validationErrors();
            $backURL = '/rentals/create/'.$apartment_id.'/'.$user_id;
            require  __DIR__ . '/../views/FormFailView.php';
        }

    }

    public function show($id)
    {
        $rental = Rental::find($id);
        $apartment = $rental->apartment;
        require __DIR__ . '/../views/RentalDetailView.php';   
    }

    public function destroy($id)
    {
        $rental = Rental::find($id);
        $rental->delete();
        header("Location: /rentals");
        die();
    }
}