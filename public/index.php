<?php
require '../vendor/autoload.php';
require '../config/database.php';

/* Instantiate Router */
$router = Router::instance();

session_start();

/* Setup Route Mappings */
require 'routes.php';

/* Match route mappings to Controller or Closure */
$match = $router->match();
if( $match && is_callable( $match['target'] ) ) 
{
    call_user_func_array( $match['target'], $match['params'] ); 
}
else if(strpos($match['target'],'#') !== false)
{
    list($controller_name,$method) = explode('#',$match['target']);
    $controller = new $controller_name;
    if(is_callable([$controller,$method]))
    {
        call_user_func_array( [$controller,$method], $match['params'] );
    }
    else
    {
        throw new Exception('Unknown Controller Method');
    }
}
else
{
    echo "<h1>404 Not Found</h1>";
}