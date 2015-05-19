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
        <h2>Informações de Sugestão</h2>
        <h3>Endereço</h3>
        <ul>
            <li>Rua: <?php echo $apartment->street ?></li>
            <li>Nº:  <?php echo $apartment->number ?></li>
            <li>Complemento: <?php echo $apartment->complement ?></li>
            <li>Bairro: <?php echo $apartment->neighbourhood ?></li>
            <li>Cidade: <?php echo $apartment->city ?></li>
            <li>Estado: <?php echo $apartment->state ?></li>
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
            Postado pelo Usuário X em <?php echo $review->created_at ?>: <?php echo $review->review ?>
            </div>
        <?php endforeach; ?>
        </main>

    </body>
</html>