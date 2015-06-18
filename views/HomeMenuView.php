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
        <ul>        
        <?php if(array_key_exists('user',$_SESSION)): ?>
            <?php if($_SESSION['user']->is_admin): ?>
                <li><a href='apartments'> Gerenciar Apartamentos </a></li>
                <li><a href='rentals'> Gerenciar Locações </a></li>
                <!--li><a href='history'> Visualizar Histórico </a></li-->
                <li><a href='users/create'> Cadastrar Novo Cliente </a></li>
            <?php else: ?>            
                <li><a href='suggestions/create'> Enviar Sugestão </a></li>
                <li><a href=<?php echo '"users/'.$_SESSION['logged_id'].'"'?>>
                Perfil de Usuário </a></li>
                <li><a href=<?php echo '"users/'.$_SESSION['logged_id'].'/edit"'?>>
                Editar Perfil </a></li>
            <?php endif ?>
        <?php endif ?>
        <li><a href='apartments/suggested'>Lista de Apartamentos Sugeridos </a></li>
        <li><a href='apartments/available'>Lista de Apartamentos Disponíveis </a></li>
        </ul>
        </main>

    </body>
</html>