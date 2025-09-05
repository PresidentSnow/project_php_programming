<?php
    // Defining a base class (parent class)
    class vehicle
    {
        // Owner (attribute).
        protected $brand;
        protected $model;
        protected $age;

        // Constructor.
        public function __construct($brand, $model, $age)
        {
            $this -> brand = $brand;
            $this -> model = $model;
            $this -> age = $age;
        }

        // Method
        public function getInfo()
        {
            return "{$this -> brand} {$this -> model} {$this -> age}";    
        }

        public function starting()
        {
            return "The vehicle is starting...";
        }
    }

    // Definition of a class that inherits from Vehicle
    class car extends vehicle
    {
        // Additional property
        private $numDoors;

        // Constructor that calls the parent constructor
        public function __construct($brand, $model, $age, $numDoors)
        {
            parent::__construct($brand, $model, $age);
            $this -> numDoors = $numDoors;
        }

        // Car Specific Method
        public function openDoors()
        {
            return "Opening the {$this -> numDoors} doors...";
        }

        // Method override
        public function getInfo()
        {
            return parent::getInfo() . " - {$this -> numDoors} doors";
        }
    }

    // Definition of another inherited class
    class motorcycle extends vehicle
    {
        // Additional property
        private $type;

        public function __construct($brand, $model, $age, $type)
        {
            parent::__construct($brand, $model, $age);
            $this -> type = $type;
        }

        // Specific method
        public function do_a_wheelie()
        {
            return "The motorcycle is doing a wheelie!";
        }

        public function getInfo()
        {
            return parent::getInfo() . " - Type: {$this -> type}";
        }
    }

    // Using classes

    // Creating instances (objects)
    $myCar = new car("Toyota", "Corolla", 2020, 4);
    $myMoto = new motorcycle("Honda", "CBR600", 2019, "Sporty");

    // Call methods
    echo $myCar -> getInfo() . "\n"; // Toyota Corolla (2020) - 4 doors
    echo $myCar -> starting() . "\n"; // The vehicle is starting...
    echo $myCar -> openDoors() . "\n"; // Opening the fourth doors...

    echo "\n";

    echo $myMoto -> getInfo() . "\n"; // Honda CBR600 (2019) - Type: Sporty
    echo $myMoto -> do_a_wheelie() . "\n"; // The motorcycle is doing a wheelie!
    echo $myMoto -> starting() . "\n"; // The vehicle is starting...

    echo "\n";

    // Polymorphism: treat different objects in the same way
    function showInfoVehicle(vehicle $vehicle)
    {
        echo "Vehicle information: " . $vehicle -> getInfo() . "\n";
    }

    showInfoVehicle($myCar);
    showInfoVehicle($myMoto);
?>