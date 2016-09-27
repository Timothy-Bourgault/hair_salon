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

        function getName()
        {
            return $this->name;
        }

    }

 ?>
