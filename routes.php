<?php

/* Declare all Route Mappings here */

$router->map('GET','/suggestions','SuggestionController#index');
$router->map('GET','/suggestions/[i:id]','SuggestionController#show');
$router->map('GET','/suggestions/create','SuggestionController#create');
$router->map('POST','/suggestions','SuggestionController#store');