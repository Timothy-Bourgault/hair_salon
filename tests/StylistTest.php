<?php

    /**
    * @backupGlobals disabled
    * @backupsStaticAttributes disabled
    **/

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function test_getName()
        {
            // Arrange
            $name = "Betty";
            $test_Stylist = new Stylist($name, "Wednesday, Friday", "cut, perm, style, shampoo", 1);
            // Act
            $result = $test_Stylist->getName();
            return var_dump($result);
            // Assert
            $this->assertEquals($name, $result);
        }

        function test_save()
        {
            // Arrange
            $name = "Betty";
            $test_Stylist = new Stylist($name, "Wednesday, Friday", "cut, perm, style, shampoo", 1);
            $test_Stylist->save();
            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals($test_Stylist, $result[0]);
        }
    }

 ?>
