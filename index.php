<?php
require __DIR__.'/vendor/autoload.php';

use Client\Client;
use Vehicle\Vehicle;
use Tire\Tire;
use StationManager\StationManager;
use StationWorker\StationWorker;

$tire    = new Tire('michelin', 'winter', '205-65-15', 'gum', true, 10.2);
$auto    = new Vehicle('bmw', '205-65-15', 'blue', $tire);
$client  = new Client('Ded', 'male', 35, 187.5, 80, $auto, 300, 'AE6464-4');
$worker  = new StationWorker('Yura', 'male', 55, 189.5, 120);
$manager = new StationManager('Egor', 'male', 33, 190, 78);


$tire2   = new Tire('hankook', 'winter', '205-65-15', 'gum', true, 10.2);
$auto2   = new Vehicle('Toyota', '205-65-15', 'blue', $tire2);
$client2 = new Client('Man', 'male', 35, 187.5, 80, $auto2, 300, 'AE6464-4');


$manager->createOrder($client);
$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);
$manager->returnVehicleToClients([$client]);


$manager->createOrder($client2);
$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);
$manager->returnVehicleToClients([$client2]);

var_dump($manager);
var_dump($worker);
var_dump($client);
var_dump($client2);