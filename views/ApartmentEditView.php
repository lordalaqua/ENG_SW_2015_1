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
            <h2>Criar Apartamento</h2>
            <form role="form" method="POST" action=<?php echo '"/apartments/'.$apartment->id.'"'?> id="form">

            <h3>Informações do Apartamento</h3>
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
                <label for="room_total">Nº de Quartos:</label>
                <select name="room_total">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>                    
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="form-element">
                <label for="num_bathrooms">Nº de Banheiros:</label>
                <select name="num_bathrooms">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>                    
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="form-element">
                <label for="num_garages">Nº de Vagas na Garagem:</label>
                <select name="num_garages">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>                    
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="form-element">
                <label>Logística para chegar aos Campi:</label>
                <label><input type= "radio" name="campi_logistics" value="1" checked>1</label>
                <label><input type= "radio" name="campi_logistics" value="2">2</label>
                <label><input type= "radio" name="campi_logistics" value="3">3</label>
                <label><input type= "radio" name="campi_logistics" value="4">4</label>
                <label><input type= "radio" name="campi_logistics" value="5">5</label>
            </div>
            <div class="form-element">
                <label>Disponibilidade de Serviços:</label>
                <label><input type= "radio" name="service_availability" value="1" checked>1</label>
                <label><input type= "radio" name="service_availability" value="2">2</label>
                <label><input type= "radio" name="service_availability" value="3">3</label>
                <label><input type= "radio" name="service_availability" value="4">4</label>
                <label><input type= "radio" name="service_availability" value="5">5</label>
            </div> 
            <div class="form-element">
                <label>Conforto:</label>
                <label><input type= "radio" name="comfort" value="1" checked>1</label>
                <label><input type= "radio" name="comfort" value="2">2</label>
                <label><input type= "radio" name="comfort" value="3">3</label>
                <label><input type= "radio" name="comfort" value="4">4</label>
                <label><input type= "radio" name="comfort" value="5">5</label>
            </div>            
            <div class="form-element">
                <label for="other_info">Informações Adicionais</label>
                <textarea name="other_info" id="other_info"></textarea>
            </div>
            <div class="form-element">
                <button type="submit"> Criar Apartamento </button>
            </div>
            </form>
        </main>
    </body>
</html>