<?php

require_once "Repository.php";
require_once __DIR__.'/../models/Car.php';

class CarRepository extends Repository {
    public function getCars(){
        $query = 'SELECT * FROM tcs.cars WHERE status = 0';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute();
        $result = [];

        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($cars as $car) {
            $result[] = new Car($car['id'], $car['make'], $car['model'], $car['year'], $car['color'], $car['image'], $car['registration'], $car['status'], $car["ppd"]);
        }

        return $result;
    }
}