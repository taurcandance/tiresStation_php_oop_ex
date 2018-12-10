<?php
require __DIR__.'/vendor/autoload.php';

use Client\Client;
use Vehicle\Vehicle;
use Tire\Tire;
use StationManager\StationManager;
use StationWorker\StationWorker;

$worker  = new StationWorker('Yura', 'male', 55, 189.5, 120);
$manager = new StationManager('Egor', 'male', 33, 190, 78);

$tire1   = new Tire('michelin', 'winter', '205-65-15', 'gum', true, 10.2);
$auto1   = new Vehicle('TOYOTA', '205-65-15', 'blue', $tire1);
$client1 = new Client('Ded', 'male', 35, 187.5, 80, $auto1, 560, 'KH6464-1');

$tire2   = new Tire('hankook', 'winter', '205-65-15', 'gum', true, 10.2);
$auto2   = new Vehicle('AUDI', '205-65-15', 'blue', $tire2);
$client2 = new Client('Man', 'male', 35, 187.5, 80, $auto2, 277, 'AH1347-3');

$tire3   = new Tire('belshina', 'winter', '215-60-17', 'gum', true, 10.2);
$auto3   = new Vehicle('GEELY', '205-65-15', 'grey', $tire3);
$client3 = new Client('Vova', 'male', 34, 187.5, 98.5, $auto3, 3000, 'HB5566-4');


$tire4   = new Tire('belshina', 'winter', '185-60-15', 'gum', true, 10.2);
$auto4   = new Vehicle('FORD', '205-65-15', 'grey', $tire4);
$client4 = new Client('Philip', 'male', 34, 187.5, 98.5, $auto4, 2000, 'DB1266-5');

$tire5   = new Tire('belshina', 'winter', '215-60-18', 'gum', true, 10.2);
$auto5   = new Vehicle('CITROEN', '205-60-16', 'yellow', $tire5);
$client5 = new Client('Sergey', 'male', 55, 187.5, 98.5, $auto5, 4000, 'HB5526-4');


$manager->createOrder($client1);
$manager->createOrder($client2);
$manager->createOrder($client3);
$manager->createOrder($client4);
$manager->createOrder($client5);


$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);
$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);
$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);
$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);
$manager->giveTaskToWorker($worker);
$manager->returnVehicleAfterRepairFromWorker($worker);

$manager->returnVehicleToClients([$client1, $client2, $client3, $client4, $client5]);

var_dump($manager);
var_dump($worker);
if ($client1->vehicle) {
    var_dump($client1->vehicle->getNumber());
} else {
    var_dump($client1->vehicle);
}
if ($client2->vehicle) {
    var_dump($client2->vehicle->getNumber());
} else {
    var_dump($client2->vehicle);
}
if ($client3->vehicle) {
    var_dump($client3->vehicle->getNumber());
} else {
    var_dump($client3->vehicle);
}
if ($client4->vehicle) {
    var_dump($client4->vehicle->getNumber());
} else {
    var_dump($client5->vehicle);
}
if ($client5->vehicle) {
    var_dump($client5->vehicle->getNumber());
} else {
    var_dump($client5->vehicle);
}

echo 'time to eat<br />';
echo $client2->getName() . 'Energy =' . $client2->getEnergy() . '<br />';
echo $client3->getName() . 'Energy =' . $client3->getEnergy() . '<br />';

$drinks = array('bananaJuice', 'orangeJuice', 'kiwiJuice');
$products = array('potatos','cucumber', 'tomato','carrot');
$dinnerRoom = new \DinnerRoom\DinnerRoom($drinks, $products);
$dinnerRoom->cookFood();
$dinnerRoom->feed($client2);
$dinnerRoom->washAndClear($client3);
$dinnerRoom->giveADrink($client3);

echo "{$client2->getName()} Energy = {$client2->getEnergy()} <br />";
echo "{$client3->getName()} Energy = {$client3->getEnergy()} <br />";
