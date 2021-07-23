<?php
require_once "hideSettings/dbSettings.php";
require_once 'DB.php';
$db = new DB();
$setDB = new dbSettings;
$setting = $setDB->getSettings();
$header_API_key = "x-api-key: " . $setting['API_key'];

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.ambeedata.com/latest/pollen/by-place?place=Rypin",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Content-type: application/json",
        $header_API_key,
    ],
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
    $arr = json_decode($response);

    $grass_pollen_count = $arr->{"data"}[0]->{"Count"}->{"grass_pollen"};
    $tree_pollen_count = $arr->{"data"}[0]->{"Count"}->{"tree_pollen"};
    $weed_pollen_count = $arr->{"data"}[0]->{"Count"}->{"weed_pollen"};
    $grass_pollen_risk = $arr->{"data"}[0]->{"Risk"}->{"grass_pollen"};
    $tree_pollen_risk = $arr->{"data"}[0]->{"Risk"}->{"tree_pollen"};
    $weed_pollen_risk = $arr->{"data"}[0]->{"Risk"}->{"weed_pollen"};

// $query = "INSERT INTO `" . $setting['dbName'] . "`.`pyl_cholewinskiego` (`jakosc_powietrza`, `pm1`, `pm25`, `pm10`, `cisnienie`, `wilgotnosc`, `temperatura`) VALUES  ($jakosc_powietrza, $pm1, $pm25, $pm10, $cisnienie, $wilgotnosc, $temperatura)  ";

// $db->setData($query);
}
