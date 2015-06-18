<?php

class InterestController {

    public function index()
    {
        $interests = Interest::all();
        require __DIR__ . '/../views/InterestListView.php';
    }

    public function create($id)
    {
        $apartment = Apartment::find($id);
        $users = User::allClients();
        require __DIR__ . '/../views/InterestUserListView.php';
    }

    public function store($id)
    {
        $interest = Interest::create($_POST,$id,$_SESSION['logged_id']);
        header("Location: /interests/".$interest->id);
        die();        
    }

    public function show($id)
    {
        $interest = Interest::find($id);
        $apartment = $interest->apartment;
        require __DIR__ . '/../views/InterestDetailView.php';
    }

    public function destroy($id)
    {
        $interest = Interest::findByIds($id,$_SESSION['logged_id']);
        $interest->delete();
        header("Location: /interests");
        die();
    }
}