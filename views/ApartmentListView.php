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
        <?php if(array_key_exists('user',$_SESSION) && $_SESSION['user']->is_admin): ?>
        <a href='/apartments/create'>Cadastrar Apartamento </a>
        <?php endif ?>
        <h2>Apartamentos <?php echo $title ?></h2>
        <?php if(count($apartments) > 0): ?>        
        <?php foreach($apartments as $i=>$apartment): ?>
            <a href="/apartments/<?php echo $apartment->id ?>">Apartamento <?php echo $i+1 ?></a>
             - <?php echo count($apartment->reviews) ?>
            Review<?php echo count($apartment->reviews) > 1 ? 's':'' ?> <br>
            <?php echo $apartment->street ?>, <?php echo $apartment->number ?>,
            <?php echo $apartment->complement ?><br>
            <?php echo $apartment->neighbourhood ?>, <?php echo $apartment->city ?>,
            <?php echo $apartment->state ?> <br><br>         
        <?php endforeach; ?>
        <?php else: ?>
            <h3>Não há apartamentos a exibir.
        <?php endif; ?>
        </main>
    </body>
</html>