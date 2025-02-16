<?php

/*

GET Data from AtmoSud API
https://api.atmosud.org

data_type inside URL (GET)

1. Micro-Stations (DIAMS)  : micro_station
2. Stations de Référence   : station_ref
3. Modélisation IQAIR H    : mod_iqairh

*/

use Dotenv\Dotenv;

require '../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$api_key_atmosud = $_ENV['PURPLEAIR_API_KEY'];

$data_type=$_GET['data_type'];

if ($data_type == 'micro_station') {
    $url = 'https://api.atmosud.org/observations/capteurs/sites/live?format=json&download=false&delais=60&formatage=dict&token='.$api_key_atmosud;
}

if ($data_type == 'station_ref') {
    $url = 'https://api.atmosud.org/observations/stations?polluant_id=39,24,68&format=json&download=false&token='.$api_key_atmosud;
}


$json_data = file_get_contents($url);

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
echo $json_data;