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
            <h2>Dados de Locação</h2>
            <form method="POST" action=<?php echo '"/rentals/create/'.$apartment_id.'/'.$user_id.'"'?>>
            <div><label>Duração (em quinzenas): </label> <input type="text" name="duration"></div>
            <div><label>Preço por quinzena (R$): </label><input type="text" name="price"></div>
            <button type="submit">Cadastrar Locação</button>
            </form>
        </main>
    </body>
</html>