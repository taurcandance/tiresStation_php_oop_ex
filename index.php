<?php
require __DIR__.'/vendor/autoload.php';

use Client\Client;
use DoggyFarm\DoggyFarm;
use StationCashier\StationCashier;
use TiresStation\TiresStation;
use Vehicle\Vehicle;
use Tire\Tire;
use StationManager\StationManager;
use StationWorker\StationWorker;
use DinnerRoom\DinnerRoom;

$worker  = new StationWorker('Yura', 'male', 55, 189.5, 120);
$manager = new StationManager('Egor', 'male', 33, 190, 78);
$cashier = new StationCashier();

$tire1   = new Tire('michelin', 'winter', '205-65-15', 'gum', true, 10.2);
$auto1   = new Vehicle('TOYOTA', '205-65-15', 'blue', $tire1);
$client1 = new Client('Ded', 'male', 35, 187.5, 80, $auto1, 560, 'KH6464-1');

$tire2   = new Tire('hankook', 'winter', '205-65-15', 'gum', true, 10.2);
$auto2   = new Vehicle('AUDI', '205-65-15', 'blue', $tire2);
$client2 = new Client('Man', 'male', 35, 187.5, 80, $auto2, 239, 'AH1347-3');

$tire3   = new Tire('belshina', 'winter', '215-60-17', 'gum', true, 10.2);
$auto3   = new Vehicle('GEELY', '205-65-15', 'grey', $tire3);
$client3 = new Client('Vova', 'male', 34, 187.5, 98.5, $auto3, 3000, 'HB5566-4');


$tire4   = new Tire('belshina', 'winter', '185-60-15', 'gum', true, 10.2);
$auto4   = new Vehicle('FORD', '205-65-15', 'grey', $tire4);
$client4 = new Client('Philip', 'male', 34, 187.5, 98.5, $auto4, 2000, 'DB1266-5');

$tire5   = new Tire('belshina', 'winter', '215-60-18', 'gum', true, 10.2);
$auto5   = new Vehicle('CITROEN', '205-60-16', 'yellow', $tire5);
$client5 = new Client('Sergey', 'male', 55, 187.5, 98.5, $auto5, 4000, 'HB5526-4');


$station = new TiresStation();
$station->setManager($manager);
$station->setWorker($worker);
$station->setCashier($cashier);
$station->setStationlMoneyStorage(5967.5);
$station->powerOn();
$station->doWork($client2,[1]);

var_dump($station);
var_dump($client2);
