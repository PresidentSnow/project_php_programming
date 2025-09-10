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
        public function getId() { return $this -> id; }
        public function getName() { return $this -> name; }
        public function getPrice() { return $this -> price; }
        public function getStock() { return $this -> stock; }

        // Method for updating stock
        public function reduceStock($quantity)
        {
            if ($this -> stock >= $quantity)
            {
                $this -> stock -= $quantity;
                $this -> updateEnBD();
                return true;
            }
            return false;
        }

        private function updateEnBD()
        {
            $db = DatabaseConnection::getInstance() -> getConnection();
            $stmt = $db -> prepare("UPDATE products SET stock = ? WHERE id = ?");
            $stmt -> execute([$this -> stock, $this -> id]);
        }

        // Static method for search products
        public static function findForId($id)
        {
            $db = DatabaseConnection::getInstance() -> getConnection();
            $stmt = $db -> prepare("SELECT * FROM products WHERE id = ?")
            $stmt -> execute([$id]);
            $data = $stmt -> fetch(PDD::FETCH_ASSOC);

            if ($data)
            {
                return new Product
                (
					$data['id'],
					$data['name'],
					$data['price'],
					$data['stock']
                );
            }
            return null;
        }
    }
?>