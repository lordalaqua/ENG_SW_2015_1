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

        <a href="rentals/create">Registrar Aluguel</a>
        <main>
        <h2> Aluguéis Correntes </h2>
        <ul>
        <?php foreach($rentals as $i=>$rental) : ?>
            <li>
                <a href=<?php echo '"rentals/'.$rental->id.'"'?>>
                <?php echo "Aluguel ".($i+1) ?></a>
                 - Usuário: <a href=<?php echo '"/users/'.$rental->user->id.'"'?>>
                <?php echo $rental->user->name ?></a>
                <a href=<?php echo '"/apartments/'.$rental->apartment->id.'"'?>>
                 (Ver Apartamento) </a>
            </li>
        <?php endforeach ?>
        </ul>
        </main>
    </body>
</html>