<?php

require_once("DB.php");

//sprawdzamy czy otrzymaliśmy TOKEN.
if (isset($_GET[TOKEN])) {
    $token = $_GET[TOKEN];


    //sprawdzamy czy token jest prawidłowy
    if ($token == "7894561230") {

        //sprawdzamy czy otrzymalismy wymagane parametry
        if ((isset($_GET[t_sypialnia])) && $_GET[t_sypialnia] > 10 && $_GET[t_sypialnia] < 50) {
            $db = new DB();
            // $db->connectDB();
            $db->getData("INSERT INTO zegar_sypialnia SET value='$_GET[t_sypialnia]'");
        }
    }
}