<?php
require_once "hideSettings/dbSettings.php";
require_once 'DB.php';
$db = new DB();
$setDB = new dbSettings;
$setting = $setDB->getSettings();

//APIv2 https://airapi.airly.eu/v2/measurements/point?lat=53.06277&lng=19.41194&apikey=21f8c7970f554ceba41436ccf28138c4

$arr = json_decode(file_get_contents('https://airapi.airly.eu/v2/measurements/point?lat=53.06277&lng=19.41194&language=pl&apikey=21f8c7970f554ceba41436ccf28138c4'));
// echo "<pre>";

// var_dump($arr->{"current"});


$jakosc_powietrza = round($arr->{"current"}->{"indexes"}[0]->{"value"}, 1);
$pm1 = round($arr->{"current"}->{"values"}[0]->{"value"}, 1);
$pm25 = round($arr->{"current"}->{"values"}[1]->{"value"}, 1);
$pm10 = round($arr->{"current"}->{"values"}[2]->{"value"}, 1);
$cisnienie = round($arr->{"current"}->{"values"}[3]->{"value"}, 0);
$wilgotnosc = round($arr->{"current"}->{"values"}[4]->{"value"}, 1);
$temperatura = round($arr->{"current"}->{"values"}[5]->{"value"}, 1);
// $skazenie = $arr->{"current"}->{"values"}->{"pollutionLevel"};


// echo "Jakosc powietrza: " . $jakosc_powietrza;
// echo ("<br>");
// echo "PM 1: " . $pm1;
// echo ("<br>");
// echo "PM 2,5: " . $pm25;
// echo ("<br>");
// echo "PM 10: " . $pm10;
// echo ("<br>");
// echo "Ciśnienie: " . $cisnienie;
// echo ("<br>");
// echo "Temperatura: " . $temperatura;
// echo ("<br>");
// echo "Wilgotność: " . $wilgotnosc;
// echo ("<br>");
// echo "Skażenie: ".$skazenie;
// echo("<br>");

$query = "INSERT INTO `" . $setting['dbName'] . "`.`pyl_warszawska` (`jakosc_powietrza`, `pm1`, `pm25`, `pm10`, `cisnienie`, `wilgotnosc`, `temperatura`) VALUES  ($jakosc_powietrza, $pm1, $pm25, $pm10, $cisnienie, $wilgotnosc, $temperatura)  ";

$db->setData($query);	

// POLACZ Z BAZA DANYCH
// $conn = @mysql_connect ($cfg['db_server'], $cfg['db_user'], $cfg['db_pass']);
// $select = @mysql_select_db ($cfg['db_name'], $conn);

// if (!$conn) {
//     die ('#ERROR# Nie udało się połączyć z bazą danych. Proszę spróbować ponownie za kilka minut.');
// }

// if (!$select) {
//     die ('#ERROR# Nie udało się wybrać bazy danych. Proszę spróbować ponownie za kilka minut.');
// }

// $data_czas =date('Y-m-d H:i:s');
// $data_czas2 =date('H:i:s d-m-Y');


// $ins = @mysql_query("INSERT INTO `delphi_archiwum2`.`pyl_warszawska` (`jakosc_powietrza`, `pm1`, `pm25`, `pm10`, `cisnienie`, `wilgotnosc`, `temperatura`, `skazenie`) VALUES  ($jakosc_powietrza, $pm1, $pm25, $pm10, $cisnienie, $wilgotnosc, $temperatura, $skazenie)  ");
// $ins = @mysql_query("INSERT INTO `delphi_archiwum2`.`pyl_warszawska` (`jakosc_powietrza`, `pm1`, `pm25`, `pm10`, `cisnienie`, `wilgotnosc`, `temperatura`) VALUES  ($jakosc_powietrza, $pm1, $pm25, $pm10, $cisnienie, $wilgotnosc, $temperatura)  ");				
				
				
// die ('#OK;'.$data_czas2. '# - Dane zostały zapisane w bazie.');

// if (!$ins) {
//     die ('#ERROR# Nie udało się dokonać zapisu. Proszę spróbować ponownie za kilka minut.');
// }