<?php

require_once "Repository.php";
require_once __DIR__ . '/../models/Car.php';

class CarRepository extends Repository
{
    public function getCars()
    {
        $query = 'SELECT * FROM tcs.cars WHERE status = 0';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute();
        $result = [];

        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cars as $car) {
            $result[] = new Car($car['id'], $car['make'], $car['model'], $car['year'], $car['color'], $car['image'], $car['registration'], $car['status'], $car["ppd"]);
        }

        return $result;
    }
    public function addCar($make, $model, $year, $color, $image, $registration, $ppd)
    {
        $query = 'INSERT INTO tcs.cars ("make", "model", "year", "color", "image", "registration", "ppd") VALUES (:make, :model, :year_, :color, :image_, :registration, :ppd)';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->bindParam(":make", $make, PDO::PARAM_STR);
        $stmt->bindParam(":model", $model, PDO::PARAM_STR);
        $stmt->bindParam(":year_", $year, PDO::PARAM_INT);
        $stmt->bindParam(":color", $color, PDO::PARAM_STR);
        $stmt->bindParam(":image_", $image, PDO::PARAM_STR);
        $stmt->bindParam(":registration", $registration, PDO::PARAM_STR);
        $stmt->bindParam(":ppd", $ppd, PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }
    public function updateCar($id, $newImg, $newPpd)
    {
        $query = 'UPDATE tcs.cars SET "image" = :newImg, "ppd" = :newPpd WHERE id = :id';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->bindParam(":newImg", $newImg, PDO::PARAM_STR);
        $stmt->bindParam(":newPpd", $newPpd, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }
    public function deleteCar($id)
    {
        $query = 'DELETE FROM tcs.cars WHERE id = :id';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }
}
