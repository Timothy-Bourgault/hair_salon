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
            $name = "Bob Weir";
            $stylist_id = 1;
            $test_client1 = new Client($name, $stylist_id);
            $test_client1->save();
            $name = "James Bosh";
            $stylist_id = 2;
            $test_client2 = new Client($name, $stylist_id);
            $test_client2->save();
            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

        function test_deleteClient()
        {
            $client_name1 = "Bob Weir";
            $stylist_id = 1;
            $test_client1 = new Client($client_name1, $stylist_id);
            $test_client1->save();
            $client_name2 = "James Bosh";
            $stylist_id = 2;
            $test_client2 = new Client($client_name2, $stylist_id);
            $test_client2->save();
            // Act
            $test_client1->deleteClient();
            $result_client = Client::getAll();
            // Assert
            $this->assertEquals([$test_client2], $result_client);
        }

     }


 ?>
