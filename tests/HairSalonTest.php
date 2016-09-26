<?php

    /**
    * @backupGlobals disabled
    * @backupsStaticAttributes disabled
    **/

    require_once "src/HairSalon.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    

 ?>
