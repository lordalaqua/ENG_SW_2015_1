<?php

class SuggestionController {

    public function create()
    {
        require __DIR__ . '/../views/ReviewCreateView.php';
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
            $backURL = '/suggestions/create';
            require  __DIR__ . '/../views/FormFailView.php';
        }
    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->approve();
        header("Location: /apartments/".$apartment->id);
        die();
    }
}