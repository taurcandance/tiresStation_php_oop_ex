<?php
require __DIR__.'/vendor/autoload.php';

use Client\Client;
use Vehicle\Vehicle;
use Tire\Tire;
use StationManager\StationManager;
use StationWorker\StationWorker;

$tires   = new Tire('honkook', 'winter', '205-65-15', true, 20);
$auto    = new Vehicle('bmw', '205-65-15', 'blue', $tires);
$client  = new Client('Ded', 'male', 35, 187.5, 80, $auto, 300, 'AE6464-4');
$worker  = new StationWorker('Yura', 'male', 55, 189.5, 120);
$manager = new StationManager('Egor', 'male', 33, 190, 78);



var_dump($manager);
var_dump($worker);
var_dump($client);

$manager->takeOrder($client, $auto);

var_dump($manager);
var_dump($worker);
var_dump($client);

$manager->giveTaskWorker($worker);

var_dump($manager);
var_dump($worker);
var_dump($client);

$manager->getBackVehicleFromWorker($worker);

var_dump($manager);
var_dump($worker);
var_dump($client);

$manager->returnVehicleToClients([$client]);

var_dump($manager);
var_dump($worker);
var_dump($client);