<?php

    class Stylist
    {
        private $id;
        private $name;
        private $scheduled_days;
        private $specialties;

        function __construct($name, $scheduled_days, $specialties, $id = null)
        {
            $this->id = $id;
            $this->name = $name;
            $this->scheduled_days = $scheduled_days;
            $this->specialties = $specialties;
        }

        // Getters and Setters

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getScheduledDays()
        {
            return $this->scheduled_days;
        }

        function setScheduledDays($new_schedule)
        {
            $this->scheduled_days = (string) $new_schedule;
        }

        function getSpecialties()
        {
            return $this->specialties;
        }

        function setSpecialties($new_specialties)
        {
            $this->specialties = (string) $new_specialties;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists(name, scheduled_days, specialties) VALUES ('{$this->getName()}', '{$this->getScheduledDays()}', '{$this->getSpecialties()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function deleteStylist()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->id};");
        }

        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}'
            WHERE id = {$this->id};");
            $this->setName($new_name);
        }

        function updateScheduledDays($new_scheduled_days)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET scheduled_days = '{$new_scheduled_days}'
            WHERE scheduled_days = {$this->scheduled_days};");
        }

        function updateSpecialties($new_specialties)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET specialties = '{$new_specialties}'
            WHERE specialties = {$this->specialties};");
        }

// Static Functions

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $scheduled_days = $stylist['scheduled_days'];
                $specialties = $stylist['specialties'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $scheduled_days, $specialties, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }


    }

 ?>
