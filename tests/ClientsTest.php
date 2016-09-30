<?php

    /**
    * @backupGlobals disabled
    * @backupsStaticAttributes disabled
    **/

    require_once "src/Clients.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientsTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Clients::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = "Bob Weir";
            $test_Clients = new Clients($name, 1);
            // Act
            $result = $test_Clients->getName();
            // Assert
            $this->assertEquals($name, $result);
        }

    //     function test_save()
    //     {
    //         // Arrange
    //         $name = "Betty";
    //         $test_Clients = new Clients($name, "Wednesday, Friday", "cut, perm, style, shampoo");
    //         $test_Clients->save();
    //         // Act
    //         $result = Clients::getAll();
    //         // Assert
    //         $this->assertEquals($test_Clients, $result[0]);
    //     }
    //
    //     function test_getAll()
    //     {
    //         // Arrange
    //         $name = "Betty";
    //         $test_Clients1 = new Clients($name, "Wednesday, Friday", "cut, perm, style, shampoo");
    //         $test_Clients1->save();
    //         $name = "Marco";
    //         $test_Clients2 = new Clients($name, "Thursday, Monday", "color, shampoo, style");
    //         $test_Clients2->save();
    //         // Act
    //         $result = Clients::getAll();
    //         // Assert
    //         $this->assertEquals([$test_Clients1, $test_Clients2], $result);
    //     }
    //
    //     function test_deleteClients()
    //     {
    //         $client_name1 = "Betty";
    //         $test_Clients1 = new Clients($client_name1, "Wednesday, Friday", "cut, perm, style, shampoo");
    //         $test_Clients1->save();
    //         $Clients_name2 = "Marco";
    //         $test_Clients2 = new Clients($Clients_name2, "Thursday, Monday", "color, shampoo, style");
    //         $test_Clients2->save();
    //         // Act
    //         $test_Clients1->deleteClients();
    //         $result_Clientss = Clients::getAll();
    //         // Assert
    //         $this->assertEquals([$test_Clients2], $result_Clients);
    //     }
    //
    //     function test_setName()
    //     {
    //         // Arrange
    //         $client_name1 = "Betty";
    //         $test_Clients1 = new Clients($client_name1, "Wednesday, Friday", "cut, perm, style, shampoo");
    //         // Act
    //         $new_name = "Betty White";
    //         $test_Clients1->setName($new_name);
    //         // Assert
    //         $this->assertEquals($new_name, $test_Clients1->getName());
    //     }
     }


 ?>
