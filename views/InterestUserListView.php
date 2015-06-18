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
        <h2>Selecionar Usuários para Interesse Conjunto</h2>
        <form role="form" method="POST" action=<?php echo '"/interests/create/'.$apartment->id.'"'?> id="form">
        <?php if(count($users) > 0): ?>        
        <?php foreach($users as $i=>$user): ?>
            <?php if($user->id != $_SESSION['logged_id']): ?>
            <div>
                <input type="checkbox" name="user_id[]" value=<?php echo $user->id?>>
                <a href=<?php echo '"/users/'.$user->id.'"'?>><?php echo $user->name ?></a>
            </div>
            <?php endif ?>
        <?php endforeach; ?>
        <div>
            <button type="submit"> Finalizar Seleção </button>
        </div>
        <?php else: ?>
            <h3>Não há usuários cadastrados.</h3>
        <?php endif; ?>
        </form>
        </main>
    </body>
</html>