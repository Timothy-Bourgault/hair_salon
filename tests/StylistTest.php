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

        protected function tearDown()
        {
            // Clientel::deleteAll();
            Stylist::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = "Betty";
            $test_Stylist = new Stylist($name, "Wednesday, Friday", "cut, perm, style, shampoo");
            // Act
            $result = $test_Stylist->getName();
            // Assert
            $this->assertEquals($name, $result);
        }

        function test_save()
        {
            // Arrange
            $name = "Betty";
            $test_Stylist = new Stylist($name, "Wednesday, Friday", "cut, perm, style, shampoo");
            $test_Stylist->save();
            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals($test_Stylist, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $name = "Betty";
            $test_Stylist1 = new Stylist($name, "Wednesday, Friday", "cut, perm, style, shampoo");
            $test_Stylist1->save();
            $name = "Marco";
            $test_Stylist2 = new Stylist($name, "Thursday, Monday", "color, shampoo, style");
            $test_Stylist2->save();
            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals([$test_Stylist1, $test_Stylist2], $result);
        }
    }
 ?>
