<?php

require_once("DB.php");

//sprawdzamy czy otrzymaliśmy TOKEN.
if (isset($_GET[TOKEN])) {
    $token = $_GET[TOKEN];


    //sprawdzamy czy token jest prawidłowy
    if ($token == "7894561230") {

        //sprawdzamy czy otrzymalismy wymagane parametry
        if ((isset($_GET[t_salon])) && $_GET[t_salon] > 10 && $_GET[t_salon] < 50) {
            $db = new DB();
            // $db->connectDB();
            $db->getData("INSERT INTO zegar_salon SET value='$_GET[t_salon]'");
        }
    }
}