<?php

require_once("DB.php");

//sprawdzamy czy otrzymaliśmy TOKEN.
if (isset($_GET[TOKEN])) {
    $token = $_GET[TOKEN];


    //sprawdzamy czy token jest prawidłowy
    if ($token == "7894561230") {

        //sprawdzamy czy otrzymalismy wymagane parametry

        if ((isset($_GET[p_salon])) && $_GET[p_salon] > 950 && $_GET[p_salon] < 1080) {
            $db = new DB();
            // $db->connectDB();
            $db->getData("INSERT INTO zegar_salon_pressure SET value='$_GET[p_salon]'");
        }
    }
}