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
?>