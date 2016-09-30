<?php

    class Clients
    {
        private $id;
        private $stylist_id;
        private $name;

        function __construct($name, $stylist_id, $id = null)
        {
            $this->id = $id;
            $this->stylist_id;
            $this->name = $name;
        }
// Static Functions
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
// Getters and Setters

        function getName()
        {
            return $this->name;
        }

    }
?>
