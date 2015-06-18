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
        <h2>Selecione um apartamento para alugar:</h2>
        <?php if(count($apartments) > 0): ?>        
        <?php foreach($apartments as $i=>$apartment): ?>
            <li>
            <a href="/apartments/<?php echo $apartment->id ?>">Apartamento <?php echo $i+1 ?></a>
             - <a href=<?php echo '"/rentals/create/'.$apartment->id.'"' ?>>Selecionar</a><br>
            <?php echo $apartment->street ?>, <?php echo $apartment->number ?>,
            <?php echo $apartment->complement ?><br>
            <?php echo $apartment->neighbourhood ?>, <?php echo $apartment->city ?>,
            <?php echo $apartment->state ?> <br>
            </li>
        <?php endforeach; ?>
        <?php else: ?>
            <h3>Não há apartamentos a exibir.
        <?php endif; ?>
        </main>
    </body>
</html>