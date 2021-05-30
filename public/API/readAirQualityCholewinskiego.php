<?php
require_once "hideSettings/dbSettings.php";
require_once 'DB.php';
$db = new DB();
$setDB = new dbSettings;
$setting = $setDB->getSettings();

$arr = json_decode(file_get_contents('https://airapi.airly.eu/v2/measurements/point?lat=53.068923&lng=19.422556&language=pl&apikey=yXUSp3icFww9OaXKgVWyNAdTnCCFd9Qi'));

$jakosc_powietrza = round($arr->{"current"}->{"indexes"}[0]->{"value"}, 1);
$pm1 = round($arr->{"current"}->{"values"}[0]->{"value"}, 1);
$pm25 = round($arr->{"current"}->{"values"}[1]->{"value"}, 1);
$pm10 = round($arr->{"current"}->{"values"}[2]->{"value"}, 1);
$cisnienie = round($arr->{"current"}->{"values"}[3]->{"value"}, 0);
$wilgotnosc = round($arr->{"current"}->{"values"}[4]->{"value"}, 1);
$temperatura = round($arr->{"current"}->{"values"}[5]->{"value"}, 1);

$query = "INSERT INTO `" . $setting['dbName'] . "`.`pyl_cholewinskiego` (`jakosc_powietrza`, `pm1`, `pm25`, `pm10`, `cisnienie`, `wilgotnosc`, `temperatura`) VALUES  ($jakosc_powietrza, $pm1, $pm25, $pm10, $cisnienie, $wilgotnosc, $temperatura)  ";

$db->setData($query);
