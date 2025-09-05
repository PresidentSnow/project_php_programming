<?php
    // Examplen OOP real system: Order management in an E-commerce

    // Class to handle the connection to the database (Singleton)
    class DatabaseConnection
    {
        private static $instance = null;
        private $connection;

        private function __construct()
        {
            $this -> connection = new PDO
            (
                'mysql:host=localhost;dbname=ecomerce',
                'user',
                'password'
            );
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public static function getInstance()
        {
            if (!self::$instance)
            {
                self::$instance = new DatabaseConnection();
            }
            return self::$instance;
        }

        public function getConnection()
        {
            return $this -> connection;
        }
    }

    // Class to represent a product
    class Product
    {
        private $id;
        private $name;
        private $price;
        private $stock;

        public function __construct($id, $name, $price, $stock)
        {
            $this -> id = $id;
            $this -> name = $name;
            $this -> price = $price;
            $this -> stock = $stock;
        }

        // Getters methods
    }
?>