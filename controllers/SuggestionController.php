<?php

class SuggestionController {

    public function index()
    {
        $apartments = Apartment::all();
        require __DIR__ . '/../views/list-apartments.php';
    }

    public function show($id)
    {
        $apartment = Apartment::find($id);
        if($apartment)
            require __DIR__ . '/../views/view-apartment.php';
        else
            echo '<h1>Suggestion Not found</h1>';
    }

    public function create()
    {
        require __DIR__ . '/../views/add-suggestion.php';
    }

    public function store()
    {
        $apartment = new Apartment;
        if($apartment->validate($_POST))
        {
            $old = Apartment::where('street','=',$_POST['street'])
                    ->where('number','=',$_POST['number'])
                    ->where('complement','=',$_POST['complement'])
                    ->where('neighbourhood','=',$_POST['neighbourhood'])
                    ->where('city','=',$_POST['city'])
                    ->where('state','=',$_POST['state'])->first();
            if($old === null)
            {
                $apartment->fill($_POST);
                $apartment->approved = false;       
                $apartment->save();
            }
            else
            {
                $apartment = $old;
            }            
            $review = new Review($_POST);
            $apartment->reviews()->save($review);            
            header("Location: /suggestions/".$apartment->id);
            die();
        }
        else
        {
            echo "Erros na submissão do formulário.<br>";
            echo "<a href='/suggestions/create'>Voltar</a>";
        }
    }
}