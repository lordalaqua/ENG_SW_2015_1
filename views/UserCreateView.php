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
            <h2>Criar Usuário</h2>
            <form role="form" method="POST" action="/users/create" id="form">

            <h3>Informações do Usuário</h3>
            <div class="form-element">
                <label for="name">Nome:</label>
                <input type="text" name="name">
            </div>
            <div class="form-element">
                <label for="name">Email:</label>
                <input type="text" name="email">
            </div>
            <div class="form-element">
                <label for="password">Senha:</label>
                <input type="password" name="password">
            </div>
            <div class="form-element">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf">
            </div>
            <div class="form-element">
                <label for="phone">Telefone:</label>
                <input type="text" name="phone">
            </div>

            <h4>Endereço</h4>
            <div class="form-element">
                <label for="street">Rua:</label>
                <input type="text" name="street">
            </div>
            <div class="form-element">
                <label for="number">Nº:</label>
                <input type="text" name="number">
            </div>
            <div class="form-element">
                <label for="complement">Complemento:</label>
                <input type="text" name="complement">
            </div>
            <div class="form-element">
                <label for="neighbourhood">Bairro:</label>
                <input type="text" name="neighbourhood">
            </div>
            <div class="form-element">
                <label for="city">Cidade:</label>
                <input type="text" name="city">
            </div>
            <div class="form-element">
                <label for="state">Estado:</label>
                <input type="text" name="state">
            </div>
            
            <div class="form-element">
                <button type="submit"> Criar Usuário </button>
            </div>
            </form>
        </main>

    </body>
</html>