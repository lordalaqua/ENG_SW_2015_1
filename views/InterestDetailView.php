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
        <h2> Detalhes de Interesse </h2>
            Usuário: <a href=<?php echo '"/users/'.$interest->user->id.'"'?>>
                <?php echo $interest->user->name ?></a>
            <h3>Detalhes do Apartamento:</h3>
            <a href=<?php echo '"/apartments/'.$interest->apartment->id.'"'?>>
                 (Ver Apartamento) </a>
            <h4>Endereço</h4>
            <ul>
                <li>Rua: <?php echo $apartment->street ?></li>
                <li>Nº:  <?php echo $apartment->number ?></li>
                <li>Complemento: <?php echo $apartment->complement ?></li>
                <li>Bairro: <?php echo $apartment->neighbourhood ?></li>
                <li>Cidade: <?php echo $apartment->city ?></li>
                <li>Estado: <?php echo $apartment->state ?></li>
            </ul>
            <h4> Informações Gerais </h4>
            <ul>
                <li>Nº de Quartos: <?php echo $apartment->room_total ?></li>
                <li>Nº de Banheiros: <?php echo $apartment->num_bathrooms ?></li>
                <li>Nº de Vagas na Garagem: <?php echo $apartment->num_garages ?></li>
                <li>Logística para chegar aos Campi: <?php echo $apartment->campi_logistics ?></li>
                <li>Disponibilidade de Serviços: <?php echo $apartment->service_availability ?></li>
                <li>Conforto: <?php echo $apartment->comfort ?></li>
                <li>Informações Adicionais: <?php echo $apartment->other_info ?></li>
            </ul>
        </main>
    </body>
</html>