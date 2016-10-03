<?php

    /**
    * @backupGlobals disabled
    * @backupsStaticAttributes disabled
    **/

    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = "Bob Weir";
            $test_client = new Client($name, 1);
            // Act
            $result = $test_client->getName();
            // Assert
            $this->assertEquals($name, $result);
        }

        function test_save()
        {
            // Arrange
            $name = "Bob Weir";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();
            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $name = "Betty";
            $test_client1 = new Client($name, "Wednesday, Friday", "cut, perm, style, shampoo");
            $test_client1->save();
            $name = "Marco";
            $test_client2 = new Client($name, "Thursday, Monday", "color, shampoo, style");
            $test_client2->save();
            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

     }


 ?>
