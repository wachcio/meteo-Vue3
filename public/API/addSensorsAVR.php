<?php

require_once "./DB.php";

//import API settings
require_once "hideSettings/apiSettings.php";
$apiSettings = new apiSettings;
$settings = $apiSettings->getSettings();

//check IP
require_once "IP.php";
$IP = new IP;
$user_ip = $IP->getUserIP();

if (!in_array($user_ip, $settings['whiteList'])) {
    return;
}

//sprawdzamy czy otrzymaliśmy TOKEN.
if ((isset($_GET[TOKEN]))) {

    //sprawdzamy czy token jest prawidłowy
    if ($_GET[TOKEN] == $settings['token']) {
        $data_czas = date("Y-m-d H-i-s");

        //sprawdzamy czy otrzymalismy wymagane parametry
        if ((isset($_GET[predkosc_wiatru])) || (isset($_GET[poryw_wiatru])) || (isset($_GET[kierunek_wiatru])) || (isset($_GET[opady])) || (isset($_GET[temperatura])) || (isset($_GET[temperatura2])) || (isset($_GET[t_SHT21])) || (isset($_GET[w_SHT21])) || (isset($_GET[t_BMP180])) || (isset($_GET[c_BMP180])) || (isset($_GET[lux]))) {
            $temperatura = $_GET[temperatura2] / 10;
            $temperatura2 = $_GET[temperatura] / 10;
            $wilgotnosc = $_GET[w_SHT21] / 100;
            $predkosc_wiatru_ms = $_GET[predkosc_wiatru] * 0.6668411111 / 60;
            $predkosc_wiatru_km = $_GET[predkosc_wiatru] * 2.4006279999999998 / 60;
            $temperaturaBMP180 = $_GET[t_BMP180] / 10;

            //Wzory na temperaturę odczuwalną
            // 33+(0.478+0.237*sqrt($predkosc_wiatru)-0.0124*$predkosc_wiatru)*($temperatura-33)
            //13.12+0.6215*$temperatura-11.37*pow($predkosc_wiatru,0.16)+0.3965*$temperatura*pow($predkosc_wiatru, 0.16)

            $temperatura_odczuwalna = round(13.12 + 0.6215 * $temperatura - 11.37 * pow($predkosc_wiatru_km, 0.16) + 0.3965 * $temperatura * pow($predkosc_wiatru_km, 0.16), 2);
            $temperatura_odczuwalna2 = round(33 + (0.478 + 0.237 * sqrt($predkosc_wiatru_km) - 0.0124 * $predkosc_wiatru_km) * ($temperatura - 33), 2);
            $temperatura_odczuwalna = $temperatura_odczuwalna * 100;
            $temperatura_odczuwalna2 = $temperatura_odczuwalna2 * 100;

            //Temperatura odczuwalna 3
            // Ta = To + 0.33 * e - 0.7 * V - 4.00
            // e = 6.105 * H/100 * exp[17.27 * (To/(237,7 + To)]

            $cisnienie_pary = 6.105 * $wilgotnosc / 100 * exp(17.27 * ($temperatura / (237.7 + $temperatura)));

            $temperatura_odczuwalna3 = $temperatura + 0.33 * $cisnienie_pary - 0.7 * $predkosc_wiatru_ms - 4.00;
            $temperatura_odczuwalna3 = $temperatura_odczuwalna3 * 100;
            $cisnienie_pary = $cisnienie_pary * 100;

            //Wzór na punkt rosy
            //pierwiastek 8 stopnia z (H/100)*(112+(0.9*T))+(0.1*T)-112
            //ponieważ pierwiastek 8 stopnia to inaczej liczba do potęgi 1/8
            //(pow(wilg/100;(1/8)))*(112+(0,9*temp))+(0,1*temp)-112

            $w_SHT = $_GET[w_SHT21] / 10000;

            $punkt_rosy = (pow($w_SHT, 1 / 8)) * (112 + (0.9 * $temperatura)) + (0.1 * $temperatura) - 112;
            $punkt_rosy = $punkt_rosy * 100;

            //Ciśnienie zredukowane
            $cisnienie = $_GET[c_BMP180];

            $h = 8000 * ((1 + 0.004 * $temperatura) / $cisnienie);
            $P = $cisnienie + (121 / $h);
            $Psr = ($cisnienie + $P) / 2;
            $tpm = $temperatura + ((0.6 * 121) / 100);
            $tsr = ($temperatura + $tpm) / 2;
            $h = 8000 * ((1 + 0.004 * $tsr) / $Psr);
            $cisnienie_zredukowane = $cisnienie + (121 / $h);

            $db = new DB();
            // $db->connectDB();
            $db->getData("INSERT INTO AVR SET predkosc_wiatru='$_GET[predkosc_wiatru]', poryw_wiatru='$_GET[poryw_wiatru]', kierunek_wiatru='$_GET[kierunek_wiatru]', opady='$_GET[opady]', temperatura='$_GET[temperatura2]', temperatura2='$_GET[temperatura]',temp_odczuwalna1='$temperatura_odczuwalna',temp_odczuwalna2='$temperatura_odczuwalna2',temp_odczuwalna3='$temperatura_odczuwalna3',temp_BMP='$temperaturaBMP180',cisnienie='$_GET[c_BMP180]',cisnienie_zredukowane='$cisnienie_zredukowane',temp_SHT='$_GET[t_BMP180]',wilgotnosc='$_GET[w_SHT21]', punkt_rosy='$punkt_rosy', cisnienie_pary='$cisnienie_pary', lux='$_GET[lux]', data_odczytu='$data_czas'");
        }
    }
}
