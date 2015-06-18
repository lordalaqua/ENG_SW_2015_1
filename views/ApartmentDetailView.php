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
        <h2>Informações do Apartamento</h2>
        <?php if( ! $apartment->approved): ?>
            <p> Aviso: Apartamento Sugerido, disponibilidade para aluguel sendo conferida por nossos corretores. </p>
        <?php endif ?>
        <?php if(array_key_exists('user',$_SESSION)): ?>
            <?php if( ! $_SESSION['user']->is_admin): ?>
                <?php if( Interest::findByIds($apartment->id,$_SESSION['logged_id'])) : ?>
                    <a href=<?php echo '"/interests/'.$apartment->id.'/remove"'?>> Remover Interesse </a>
                <?php else:?>                    
                    <a href=<?php echo "/interests/create/".$apartment->id?>> Marcar Interesse </a>
                <?php endif ?>
            <?php else: ?>
                <ul>
                <?php if(! $apartment->approved) : ?>
                <li><a href="/suggestions/<?php echo $apartment->id ?>">Aprovar Apartamento</a></li>
                <?php endif ?>
                <li><a href="/apartments/<?php echo $apartment->id ?>/edit">Editar Apartamento</a></li>
                <li><a href="/apartments/<?php echo $apartment->id ?>/remove">Remover Apartamento</a></li>
                </ul>
            <?php endif ?>       
        <?php endif ?>
        <h3>Endereço</h3>
        <ul>
            <li>Rua: <?php echo $apartment->street ?></li>
            <li>Nº:  <?php echo $apartment->number ?></li>
            <li>Complemento: <?php echo $apartment->complement ?></li>
            <li>Bairro: <?php echo $apartment->neighbourhood ?></li>
            <li>Cidade: <?php echo $apartment->city ?></li>
            <li>Estado: <?php echo $apartment->state ?></li>
        </ul>
        <h3> Informações Gerais </h3>
        <ul>
            <li>Nº de Quartos: <?php echo $apartment->room_total ?></li>
            <li>Nº de Banheiros: <?php echo $apartment->num_bathrooms ?></li>
            <li>Nº de Vagas na Garagem: <?php echo $apartment->num_garages ?></li>
            <li>Logística para chegar aos Campi: <?php echo $apartment->campi_logistics ?></li>
            <li>Disponibilidade de Serviços: <?php echo $apartment->service_availability ?></li>
            <li>Conforto: <?php echo $apartment->comfort ?></li>
            <li>Informações Adicionais: <?php echo $apartment->other_info ?></li>
        </ul>
        <h3>Reviews</h3>
        <?php foreach($apartment->reviews as $review): ?>
            <div>
            Postado por <?php echo $review->user->name ?> em <?php echo $review->created_at ?>: <?php echo $review->review ?>
            </div>
        <?php endforeach; ?>
        </main>

    </body>
</html>