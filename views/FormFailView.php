<!doctype html>
<html>
    <head>
        <title>Aluguel Universitário</title>
        <meta charset='UTF-8'>
        <meta name="viewport' content='width=device-width, initial-scale=1">
    </head>

    <body>
    <h1> Erros na submissão do formulário </h1>
    <a href=<?php echo '"'.$backURL.'"' ?>>Voltar</a>
    <p> Os seguintes campos continham erros: </p>
    <?php foreach($errors as $key=>$name): ?>
        <li><?php echo $name ?></li>
    <?php endforeach; ?>
    </body>        
</html>