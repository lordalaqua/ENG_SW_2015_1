<?php

class UserController {

    public function index()
    {
        $users = User::allClients();
        require __DIR__ . '/../views/UserListView.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/UserCreateView.php';
    }

    public function store()
    {
        if(User::validates($_POST))
        {
            $user = User::create($_POST);
            header("Location: /users/".$user->id);
            die();
        }
        else
        {
            $errors = User::validationErrors();
            $backURL = '/users/create';
            require  __DIR__ . '/../views/FormFailView.php';
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user)
            require __DIR__ . '/../views/UserDetailView.php';
        else
            echo '<h1>User Not found</h1>';
    }

    public function edit($id)
    {
        $user = User::find($id);
        require __DIR__ . '/../views/UserEditView.php';
    }

    public function update($id)
    {
        if(User::validates($_POST))
        {
            $user = User::find($id);
            $user->update($_POST);
            header("Location: /users/".$user->id);
            die();
        }
        else
        {
            $errors = User::validationErrors();
            $backURL = '/users/edit/'.$id;
            require  __DIR__ . '/../views/FormFailView.php';
        }
    }

    public function login()
    {
        require __DIR__ . '/../views/LoginView.php';
    }

    public function authenticate()
    {
        if(User::authenticates($_POST))
        {
            $user = User::login($_POST);
            $_SESSION["logged_id"] = $user->id;
            if($user->is_admin)
                $_SESSION["admin"] = true;
            $_SESSION["user"] = $user;
            header("Location: /");
            die();
        }
        else
        {
            echo '<h2>Usuário/Senha não cadastrados</h2>';
            echo '<a href="/login">Voltar</a>';
        }
    }
    
    public function logout()
    {
        session_unset();
        header("Location: /");
        die();
    }
}