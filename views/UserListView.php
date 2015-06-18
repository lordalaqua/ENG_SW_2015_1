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
        <h2>Usuários cadastrados</h2>
        <?php if(count($users) > 0): ?>        
        <?php foreach($users as $i=>$user): ?>
            <li><a href=<?php echo '"/users/'.$user->id.'"' ?>><?php echo $user->name ?></a></li>
        <?php endforeach; ?>
        <?php else: ?>
            <h3>Não há usuários cadastrados.</h3>
        <?php endif; ?>
        </main>
    </body>
</html>