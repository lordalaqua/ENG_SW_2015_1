<?php

/* Declare all Route Mappings here */
$router->map('GET','/',function(){ require __DIR__ . '/../views/HomeMenuView.php'; });
/* ApartmentController*/
$router->map('GET','/apartments','ApartmentController#index');
$router->map('GET','/apartments/create','ApartmentController#create');
$router->map('POST','/apartments/create','ApartmentController#store');
$router->map('GET','/apartments/[i:id]','ApartmentController#show');
$router->map('GET','/apartments/[i:id]/edit','ApartmentController#edit');
$router->map('POST','/apartments/[i:id]/edit','ApartmentController#update');
$router->map('GET','/apartments/[i:id]/remove','ApartmentController#destroy');
$router->map('GET','/apartments/suggested','ApartmentController#suggestedIndex');
$router->map('GET','/apartments/available','ApartmentController#availableIndex');

/*UserController*/
$router->map('GET','/users','UserController#index');
$router->map('GET','/users/create','UserController#create');
$router->map('POST','/users/create','UserController#store');
$router->map('GET','/users/[i:id]','UserController#show');
$router->map('GET','/users/[i:id]/edit','UserController#edit');
$router->map('POST','/users/[i:id]/edit','UserController#update');
$router->map('GET','/login','UserController#login');
$router->map('POST','/login','UserController#authenticate');
$router->map('GET','/logout','UserController#logout');

/*InterestController*/
$router->map('GET','/interests','InterestController#index');
$router->map('GET','/interests/create/[i:id]','InterestController#create');
$router->map('POST','/interests/create/[i:id]','InterestController#store');
$router->map('GET','/interests/[i:id]','InterestController#show');
$router->map('GET','/interests/[i:id]/remove','InterestController#destroy');

/*RentalController*/
$router->map('GET','/rentals','RentalController#index');
$router->map('GET','/rentals/create','RentalController#selectApartment');
$router->map('GET','/rentals/create/[i:apartment_id]','RentalController#selectUser');
$router->map('GET','/rentals/create/[i:apartment_id]/[i:user_id]','RentalController#create');
$router->map('POST','/rentals/create/[i:apartment_id]/[i:user_id]','RentalController#store');
$router->map('GET','/rentals/[i:id]','RentalController#show');
$router->map('GET','/rentals/[i:id]/remove','RentalController#destroy');

/*SuggestionController*/
$router->map('GET','/suggestions/create','SuggestionController#create');
$router->map('POST','/suggestions','SuggestionController#store');
$router->map('GET','/suggestions/[i:id]','SuggestionController#destroy');

/*HistoryController*/

$router->map('GET','/history','HistoryController#index');