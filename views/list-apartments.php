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
                <ul>
                    <li><a href="/suggestions">Todas Sugestões</a></li>
                    <li><a href="/suggestions/create">Nova Sugestão</a></li>
                </ul>
            </nav>
        </header>

        <main>
        <h2>Apartamentos Sugeridos para Inclusão</h2>
        <?php if(count($apartments) > 0): ?>        
        <?php foreach($apartments as $i=>$apartment): ?>
            <a href="/suggestions/<?php echo $apartment->id ?>">Sugestão <?php echo $i+1 ?></a>
             - <?php echo count($apartment->reviews) ?>
            Review<?php echo count($apartment->reviews) > 1 ? 's':'' ?> <br>
            <?php echo $apartment->street ?>, <?php echo $apartment->number ?>,
            <?php echo $apartment->complement ?><br>
            <?php echo $apartment->neighbourhood ?>, <?php echo $apartment->city ?>,
            <?php echo $apartment->state ?> <br><br>         
        <?php endforeach; ?>
        <?php else: ?>
            <h3>Não há sugestões cadastradas.
        <?php endif; ?>
        </main>
    </body>
</html>