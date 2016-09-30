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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients(name, stylist_id) VALUES ('{$this->getName()}', '{$this->getStylistId()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

// Static Functions

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $stylist_id = $client['sylist_id'];
                $id = $client['id'];
                $new_clients = new Clients($name, $stylist_id, $id);
                array_push($clients, $new_clients);
            }
            return $clients;
        }

// Getters and Setters

        function getName()
        {
            return $this->name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

    }
?>
