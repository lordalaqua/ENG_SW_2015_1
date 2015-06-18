<!doctype html>
<html>
    <head>
        <title>Aluguel Universitário</title>
        <meta charset='UTF-8'>
        <meta name="viewport' content='width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <h1>Aluguel Universitário</h1>
            <nav>
                <a href="/">[Home]</a>
                <?php if(array_key_exists('user',$_SESSION)): ?>
                    <?php echo $_SESSION['user']->name ?>
                    <?php if($_SESSION['user']->is_admin): ?>
                        (admin)
                    <?php endif ?>        
                    <a href='/logout'> [Sair] </a>
                <?php else: ?>
                    <a href='/login'> [Login] </a>
                <?php endif ?>
            </nav>
        </header>
        <main>
        <h2>Informações do Usuário</h2>
        <h3> Informações Gerais </h3>
        <ul>
            <li>Nome: <?php echo $user->name ?></li>
            <li>Email:  <?php echo $user->email ?></li>
            <li>Telefone:  <?php echo $user->phone ?></li>
        </ul>
        <h3>Endereço</h3>
        <ul>
            <li>Rua: <?php echo $user->street ?></li>
            <li>Nº:  <?php echo $user->number ?></li>
            <li>Complemento: <?php echo $user->complement ?></li>
            <li>Bairro: <?php echo $user->neighbourhood ?></li>
            <li>Cidade: <?php echo $user->city ?></li>
            <li>Estado: <?php echo $user->state ?></li>
        </ul>
        </main>
    </body>
</html>