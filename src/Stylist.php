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
            $this->scheduled_days;
            $this->specialties;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists(name, sheduled_days, specialties) VALUES ('{$this->getName()}', '{$this->getScheduledDays()}', '{$this->getSpecialties()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
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

// Getters and Setters

        function getName()
        {
            return $this->name;
        }

        function getScheduledDays()
        {
            return $this->scheduled_days;
        }

        function getSpecialties()
        {
            return $this->specialties;
        }
    }

 ?>
