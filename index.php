<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$weatherApiKey = $_ENV['WEATHER_API_KEY'];

$weatherApiUrl = "https://api.openweathermap.org/data/2.5/weather?";

$params = [
    'lat' => 40.234234,
    'lon' => -3.7345345,
    'units' => 'metric', //para que las unidades estén en el sistema métrico
    'appid' => $weatherApiKey,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $weatherApiUrl . http_build_query($params));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
var_dump($response);
echo "<hr>";
$return_data = json_decode($response);
echo '<pre>' . var_export($return_data, true) . '</pre>';
echo "<hr>";
