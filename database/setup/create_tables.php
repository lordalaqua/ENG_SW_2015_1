<?php

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../config/database.php'; 

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('apartments', function($table)
{
    $table->increments('id');
    $table->integer('number')->unsigned();
    $table->string('complement');
    $table->string('street');
    $table->string('neighbourhood');
    $table->string('city');
    $table->string('state');
    $table->integer('num_bathrooms')->unsigned();
    $table->integer('num_garages')->unsigned();
    $table->string('other_info');
    $table->integer('campi_logistics')->unsigned();
    $table->integer('service_availability')->unsigned();
    $table->integer('comfort')->unsigned();
    $table->integer('room_total')->unsigned();
    $table->boolean('approved');
    $table->timestamps();
});

Capsule::schema()->create('reviews', function($table)
{
    $table->increments('id');
    $table->string('review');  
    //$table->integer('user_id')->unsigned();
    //$table->foreign('user_id')->references('id')->on('users');
    $table->integer('apartment_id')->unsigned();
    $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
    $table->timestamps();
});

echo "Tables Created.\n";