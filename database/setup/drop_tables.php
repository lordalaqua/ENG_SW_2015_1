<?php

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../config/database.php'; 

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists('reviews');
Capsule::schema()->dropIfExists('rentals');
Capsule::schema()->dropIfExists('interests');
Capsule::schema()->dropIfExists('apartments');
Capsule::schema()->dropIfExists('users');

echo "Tables Dropped.\n";