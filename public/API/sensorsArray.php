<?php

// $sensorsDetail = Array(
//     0 => array("Temperatura", "AVR", "temperatura", "Odczyty z AVR", "temp", "temperatura_na_zewnatrz.png", "°C", "-5", "28"),
//     1 => array("Temperatura w urządzeniu", "AVR", "temperatura2", "Odczyty z AVR", "temp", "temperatura_raspberry.png", "°C", "-1", "50"),
//     2 => array("Prędkość wiatru km/h", "AVR", "predkosc_wiatru", "Odczyty z AVR", "wiatrKM", "wiatr.png", "km/h", "", "50"),
//     3 => array("Prędkość wiatru m/s", "AVR", "predkosc_wiatru", "Odczyty z AVR", "wiatrMS", "wiatr_ms.png", "m/s", "", "13,88"),
//     4 => array("Poryw wiatru km/h", "AVR", "poryw_wiatru", "Odczyty z AVR", "porywWiatrKM", "porywy_wiatru.png", "km/h", "", "70"),
//     5 => array("Poryw wiatru m/s", "AVR", "poryw_wiatru", "Odczyty z AVR", "porywWiatrMS", "porywy_wiatru_ms.png", "m/s", "", "19,44"),
//     // 6 => array("Kierunek wiatru", "AVR", "kierunek_wiatru", "Odczyty z AVR", "kierunekWiatru", "API/windDirectionArrow.php?w=", "", ""),
//     6 => array("Kierunek wiatru", "AVR", "kierunek_wiatru", "Odczyty z AVR", "kierunekWiatru", "API/windDirectionArrow.php?w=", "", "", ""),
//     7 => array("Opady", "AVR", "opady", "Odczyty z AVR", "opady", "opady.png", "", "", ""),
//     // 8 => array("Ciśnienie", "AVR", "cisnienie", "Odczyty z AVR", "hPa", "cisnienie.png", "hPa", "", ""),
//     8 => array("Ciśnienie", "AVR", "cisnienie", "Odczyty z AVR", "", "cisnienie.png", "hPa", "", ""),
//     // 9 => array("Ciśnienie zredukowane", "AVR", "cisnienie_zredukowane", "Odczyty z AVR", "hPa", "cisnienie_zredukowane.png", "hPa", "", ""),
//     9 => array("Ciśnienie zredukowane", "AVR", "cisnienie_zredukowane", "Odczyty z AVR", "", "cisnienie_zredukowane.png", "hPa", "", ""),
//     10 => array("Temperatura BMP180", "AVR", "temp_BMP", "Odczyty z AVR", "temp", "domek_ogrodowy.png", "°C", "-10", "28"),
//     11 => array("Wilgotność", "AVR", "wilgotnosc", "Odczyty z AVR", "z100_2", "wilgotnosc.png", "%", "", ""),
//     12 => array("Temperatura SHT21", "AVR", "temp_SHT", "Odczyty z AVR", "z100_1", "temperatura_na_zewnatrz.png", "°C", "-10", "28"),
//     13 => array("Punkt rosy", "AVR", "punkt_rosy", "Odczyty z AVR", "z100_2", "punkt_rosy.png", "°C", "", ""),
//     14 => array("Ciśnienie pary", "AVR", "cisnienie_pary", "Odczyty z AVR", "z100_2", "cisnienie_pary.png", "hPa", "", ""),
//     // 15 => array("Nasłonecznienie", "AVR", "lux", "Odczyty z AVR", "lux", "LUX.png", "lx", "", ""),
//     15 => array("Nasłonecznienie", "AVR", "lux", "Odczyty z AVR", "", "LUX.png", "lx", "", ""),
//     //-----------------RPi----------------
//     16 => array("Raspberry Pi", "Raspberry_Pi", "", "Odczyty z Raspberry Pi", "", "temperatura_raspberry.png", "°C", "", "60"),
//     17 => array("Kotłownia pomieszczenie", "28-0000062b6be2", "", "Odczyty z Raspberry Pi", "", "temperatura_piec_co.png", "°C", "", "35"),
//     18 => array("Kotłownia wyjście CO", "28-0000062bbaf9", "", "Odczyty z Raspberry Pi", "", "temperatura_piec_co.png", "°C", "45", "65"),
//     19 => array("Kotłownia powrót CO", "28-0000062b77b6", "", "Odczyty z Raspberry Pi", "", "temperatura_piec_co.png", "°C", "45", "65"),
//     20 => array("Bojler", "28-031467987aff", "", "Odczyty z Raspberry Pi", "", "bojler.png", "°C", "45", "65"),
//     21 => array("Grunt temperatura", "gpio_20_temp", "", "Odczyty z Raspberry Pi", "", "temperatura_grunt.png", "°C", "", ""),
//     22 => array("Grunt wilgotność", "gpio_20_humid", "", "Odczyty z Raspberry Pi", "", "wilgotnosc_grunt.png", "%", "", ""),
//     23 => array("Balkon temperatura", "gpio_21_temp", "", "Odczyty z Raspberry Pi", "", "temperatura_balkon.png", "°C", "", ""),
//     24 => array("Balkon wilgotność", "gpio_21_humid", "", "Odczyty z Raspberry Pi", "", "wilgotnosc_balkon.png", "%", "", ""),
//     25 => array("Pokój gościnny", "28-0000062ac124", "", "Odczyty z Raspberry Pi", "", "temperatura.png", "°C", "", ""),
//     26 => array("Przdpokój góra", "28-0000062b68cc", "", "Odczyty z Raspberry Pi", "", "temperatura.png", "°C", "", ""),
//     27 => array("Akwarium", "ip_192.168.2.195_temp", "", "Odczyty z Raspberry Pi", "", "temperatura_akwarium.png", "°C", "24", "28"),
//     28 => array("Sypialnia", "zegar_sypialnia", "", "Odczyty z Raspberry Pi", "zegary", "temperatura.png", "°C", "20", "26"),
//     29 => array("Salon", "zegar_salon", "", "Odczyty z Raspberry Pi", "zegary", "temperatura.png", "°C", "20", "26"),
//     //--------------Rpi studnia-------
//     // 30 => array("Raspberry Pi studnia", "Rpi_studnia", "", "Odczyty ze studni", "", "temperatura_raspberry.png", "°C", "", "60"),
//     // 31 => array("Studnia", "28-031661bc32ff", "", "Odczyty ze studni", "", "studnia.png", "°C", "0", ""),
//     // 32 => array("Studnia rura", "28-800000262700", "", "Odczyty ze studni", "", "studnia.png", "°C", "0", ""),
//     // 33 => array("Garaż", "28-8000000493a0", "", "Odczyty ze studni", "", "garaz.png", "°C", "", ""),
//     //--------------Czystość powietrza-------
//     30 => array("Indeks czystości powietrza", "pyl_warszawska", "jakosc_powietrza", "Czujnik pyłu na ul. Warszawskiej", "", "pyl.png", " ", "", ""),
//     31 => array("Pył zawieszony PM1", "pyl_warszawska", "pm1", "Czujnik pyłu na ul. Warszawskiej", "", "pyl_1.png", "μg/m3", "", ""),
//     32 => array("Pył zawieszony PM2,5", "pyl_warszawska", "pm25", "Czujnik pyłu na ul. Warszawskiej", "", "pyl_25.png", "μg/m3", "", ""),
//     33 => array("Pył zawieszony PM10", "pyl_warszawska", "pm10", "Czujnik pyłu na ul. Warszawskiej", "", "pyl_10.png", "μg/m3", "", ""),
//     34 => array("Ciśnienie", "pyl_warszawska", "cisnienie", "Czujnik pyłu na ul. Warszawskiej", "", "cisnienie_zredukowane.png", "hPa", "", ""),
//     35 => array("Wilgotność", "pyl_warszawska", "wilgotnosc", "Czujnik pyłu na ul. Warszawskiej", "", "wilgotnosc.png", "%", "", ""),
//     36 => array("Temperatura", "pyl_warszawska", "temperatura", "Czujnik pyłu na ul. Warszawskiej", "", "temperatura.png", "°C", "", ""),

// );

$sensorsDetail = [];
$sensorsDetail[] = array("Temperatura DS18B20", "AVR", "temperatura", "Odczyty z AVR", "temp", "temperatura_na_zewnatrz.png", "°C", "-5", "28");
$sensorsDetail[] =array("Temperatura w urządzeniu", "AVR", "temperatura2", "Odczyty z AVR", "temp", "temperatura_raspberry.png", "°C", "-1", "50");
$sensorsDetail[] = array("Prędkość wiatru km/h", "AVR", "predkosc_wiatru", "Odczyty z AVR", "wiatrKM", "wiatr.png", "km/h", "", "50");
$sensorsDetail[] = array("Prędkość wiatru m/s", "AVR", "predkosc_wiatru", "Odczyty z AVR", "wiatrMS", "wiatr_ms.png", "m/s", "", "13,88");
$sensorsDetail[] = array("Poryw wiatru km/h", "AVR", "poryw_wiatru", "Odczyty z AVR", "porywWiatrKM", "porywy_wiatru.png", "km/h", "", "70");
$sensorsDetail[] = array("Poryw wiatru m/s", "AVR", "poryw_wiatru", "Odczyty z AVR", "porywWiatrMS", "porywy_wiatru_ms.png", "m/s", "", "19,44");
  $sensorsDetail[] = array("Kierunek wiatru", "AVR", "kierunek_wiatru", "Odczyty z AVR", "kierunekWiatru", "API/windDirectionArrow.php?w=", "", "", "");
    $sensorsDetail[] = array("Opady", "AVR", "opady", "Odczyty z AVR", "opady", "opady.png", "", "", "");
    // $sensorsDetail[] = array("Ciśnienie", "AVR", "cisnienie", "Odczyty z AVR", "", "cisnienie.png", "hPa", "", ""); $sensorsDetail[] = array("Ciśnienie zredukowane", "AVR", "cisnienie_z$
    // $sensorsDetail[] = array("Temperatura BME280", "AVR", "temp_BMP", "Odczyty z AVR", "temp", "domek_ogrodowy.png", "°C", "-10", "28");
    // $sensorsDetail[] = array("Wilgotność", "AVR", "wilgotnosc", "Odczyty z AVR", "z100_2", "wilgotnosc.png", "%", "", "");
    // $sensorsDetail[] = array("Temperatura SHT21", "AVR", "temp_SHT", "Odczyty z AVR", "z100_1", "temperatura_na_zewnatrz.png", "°C", "-10", "28");
    // $sensorsDetail[] = array("Punkt rosy", "AVR", "punkt_rosy", "Odczyty z AVR", "z100_2", "punkt_rosy.png", "°C", "", "");
    // $sensorsDetail[] = array("Ciśnienie pary", "AVR", "cisnienie_pary", "Odczyty z AVR", "z100_2", "cisnienie_pary.png", "hPa", "", "");
   $sensorsDetail[] = array("Nasłonecznienie", "AVR", "lux", "Odczyty z AVR", "", "LUX.png", "lx", "", "");
    //-----------------RPi----------------
    $sensorsDetail[] = array("Raspberry Pi", "Raspberry_Pi", "", "Odczyty z Raspberry Pi", "", "temperatura_raspberry.png", "°C", "", "60");
    $sensorsDetail[] = array("Kotłownia pomieszczenie", "28-0000062b6be2", "", "Odczyty z Raspberry Pi", "", "temperatura_piec_co.png", "°C", "", "35");
    $sensorsDetail[] = array("Kotłownia wyjście CO", "28-0000062bbaf9", "", "Odczyty z Raspberry Pi", "", "temperatura_piec_co.png", "°C", "45", "65");
    $sensorsDetail[] = array("Kotłownia powrót CO", "28-0000062b77b6", "", "Odczyty z Raspberry Pi", "", "temperatura_piec_co.png", "°C", "45", "65");
    $sensorsDetail[] = array("Bojler", "28-031467987aff", "", "Odczyty z Raspberry Pi", "", "bojler.png", "°C", "45", "65");
    $sensorsDetail[] = array("Grunt temperatura", "gpio_20_temp", "", "Odczyty z Raspberry Pi", "", "temperatura_grunt.png", "°C", "", "");
  //  $sensorsDetail[] = array("Grunt wilgotność", "gpio_20_humid", "", "Odczyty z Raspberry Pi", "", "wilgotnosc_grunt.png", "%", "", "");
    $sensorsDetail[] = array("Balkon temperatura", "gpio_21_temp", "", "Odczyty z Raspberry Pi", "", "temperatura_balkon.png", "°C", "", "");
//    $sensorsDetail[] = array("Balkon wilgotność", "gpio_21_humid", "", "Odczyty z Raspberry Pi", "", "wilgotnosc_balkon.png", "%", "", "");
    $sensorsDetail[] = array("Pokój gościnny", "28-0000062ac124", "", "Odczyty z Raspberry Pi", "", "temperatura.png", "°C", "", "");
    $sensorsDetail[] = array("Przedpokój góra", "28-0000062b68cc", "", "Odczyty z Raspberry Pi", "", "temperatura.png", "°C", "", "");
    $sensorsDetail[] = array("Akwarium", "ip_192.168.2.195_temp", "", "Odczyty z Raspberry Pi", "", "temperatura_akwarium.png", "°C", "24", "28");
    $sensorsDetail[] = array("Sypialnia", "zegar_sypialnia", "", "Odczyty z Raspberry Pi", "zegary", "temperatura.png", "°C", "20", "26");
    $sensorsDetail[] = array("Salon", "zegar_salon", "", "Odczyty z Raspberry Pi", "zegary", "temperatura.png", "°C", "20", "26");
    $sensorsDetail[] = array("Salon ciśnienie", "zegar_salon_pressure", "", "Odczyty z Raspberry Pi", "zegary", "cisnienie_zredukowane.png", "hPa", "990", "1020");
    //--------------Rpi studnia-------
    // $sensorsDetail[] = array("Raspberry Pi studnia", "Rpi_studnia", "", "Odczyty ze studni", "", "temperatura_raspberry.png", "°C", "", "60");
    // $sensorsDetail[] = array("Studnia", "28-031661bc32ff", "", "Odczyty ze studni", "", "studnia.png", "°C", "0", "");
    // $sensorsDetail[] = array("Studnia rura", "28-800000262700", "", "Odczyty ze studni", "", "studnia.png", "°C", "0", "");
    // $sensorsDetail[] = array("Garaż", "28-8000000493a0", "", "Odczyty ze studni", "", "garaz.png", "°C", "", "");
    //--------------Czystość powietrza-------
    $sensorsDetail[] = array("Indeks czystości powietrza", "pyl_warszawska", "jakosc_powietrza", "Czujnik pyłu na ul. Warszawskiej", "", "pyl.png", " ", "", "");
    $sensorsDetail[] = array("Pył zawieszony PM1", "pyl_warszawska", "pm1", "Czujnik pyłu na ul. Warszawskiej", "", "pyl_1.png", "μg/m3", "", "");
    $sensorsDetail[] = array("Pył zawieszony PM2,5", "pyl_warszawska", "pm25", "Czujnik pyłu na ul. Warszawskiej", "", "pyl_25.png", "μg/m3", "", "");
    $sensorsDetail[] = array("Pył zawieszony PM10", "pyl_warszawska", "pm10", "Czujnik pyłu na ul. Warszawskiej", "", "pyl_10.png", "μg/m3", "", "");
    $sensorsDetail[] = array("Ciśnienie", "pyl_warszawska", "cisnienie", "Czujnik pyłu na ul. Warszawskiej", "", "cisnienie_zredukowane.png", "hPa", "", "");
    $sensorsDetail[] = array("Wilgotność", "pyl_warszawska", "wilgotnosc", "Czujnik pyłu na ul. Warszawskiej", "", "wilgotnosc.png", "%", "", "");
    $sensorsDetail[] = array("Temperatura", "pyl_warszawska", "temperatura", "Czujnik pyłu na ul. Warszawskiej", "", "temperatura.png", "°C", "", "");