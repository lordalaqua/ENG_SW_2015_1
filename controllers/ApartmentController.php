<?php

class ApartmentController {

    public function index()
    {
        $apartments = Apartment::all();
        $title = "Cadastrados";
        require __DIR__ . '/../views/ApartmentListView.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/ApartmentCreateView.php';
    }

    public function store()
    {
        if(Apartment::validates($_POST))
        {
            $apartment = Apartment::create($_POST);
            header("Location: /apartments/".$apartment->id);
            die();
        }
        else
        {
            $errors = Apartment::validationErrors();
            $backURL = '/apartments/create';
            require  __DIR__ . '/../views/FormFailView.php';
        }   
    }

    public function show($id)
    {
        $apartment = Apartment::find($id);
        if($apartment)
            require __DIR__ . '/../views/ApartmentDetailView.php';
    }

    public function edit($id)
    {
        $apartment = Apartment::find($id);
        require __DIR__ . '/../views/ApartmentEditView.php';
    }

    public function update($id)
    {
        if(Apartment::validates($_POST))
        {
            $apartment = Apartment::find($id);
            $apartment->update($_POST);
            header("Location: /apartments/".$apartment->id);
            die();
        }
        else
        {
            $errors = Apartment::validationErrors();
            $backURL = '/apartments/edit/'.$id;
            require  __DIR__ . '/../views/FormFailView.php';
        }
    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->delete();
        header("Location: /apartments/");
        die();
    }
    
    public function suggestedIndex()
    {
        $apartments = Apartment::allSuggested();
        $title = "Sugeridos";
        require __DIR__ . '/../views/ApartmentListView.php';
    }

    public function availableIndex()
    {
        $apartments = Apartment::allAvailable();
        $title = "Disponíveis";
        require __DIR__ . '/../views/ApartmentListView.php';
    }
}