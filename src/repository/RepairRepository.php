<?php

require_once "Repository.php";
require_once __DIR__ . '/../models/Rental.php';

class RepairRepository extends Repository
{
    public function getRepairs($mechanicId)
    {
        $query = 'SELECT r.*, u.name, u.email, u.phone FROM tcs.repairs r INNER JOIN tcs.users u ON r.client_id = u.id WHERE r.main_mechanic_id = :mechanicId AND NOT EXISTS (SELECT * FROM tcs.invoices WHERE repair_id = r.id)';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->bindParam(":mechanicId", $mechanicId, PDO::PARAM_INT);

        $stmt->execute();
        $result = [];

        $repairs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($repairs as $repair) {
            $result[] = new Repair($repair["id"], $repair["client_id"], $repair["status"], $repair["car_registration"], $repair["make"], $repair["start_date"], $repair["end_date"], $repair["price"], $repair["main_mechanic_id"], $repair["name"], $repair["email"], $repair["phone"]);
        }

        return $result;
    }
    public function addRepair($id, $make, $car_registration, $price, $mechanic_id, $start_date, $end_date)
    {
        if ($end_date) {
            if ($end_date < date("Y-m-d")) {
                return false;
            }
            $query = 'INSERT INTO tcs.repairs ("client_id", "status", "car_registration", "make", "start_date", "end_date", "price", "main_mechanic_id") VALUES (:client_id, 0, :car_registration, :make, :start_date, :end_date, :price, :main_mechanic_id)';
            $stmt = $this->database->connect()->prepare($query);
            $stmt->bindParam(":client_id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":car_registration", $car_registration, PDO::PARAM_STR);
            $stmt->bindParam(":make", $make, PDO::PARAM_STR);
            $stmt->bindParam(":start_date", $start_date, PDO::PARAM_STR);
            $stmt->bindParam(":end_date", $end_date, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_INT);
            $stmt->bindParam(":main_mechanic_id", $mechanic_id, PDO::PARAM_INT);
        } else {
            $query = 'INSERT INTO tcs.repairs ("client_id", "status", "car_registration", "make", "start_date", "price", "main_mechanic_id") VALUES (:client_id, 0, :car_registration, :make, :start_date, :price, :main_mechanic_id)';
            $stmt = $this->database->connect()->prepare($query);
            $stmt->bindParam(":client_id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":car_registration", $car_registration, PDO::PARAM_STR);
            $stmt->bindParam(":make", $make, PDO::PARAM_STR);
            $stmt->bindParam(":start_date", $start_date, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_INT);
            $stmt->bindParam(":main_mechanic_id", $mechanic_id, PDO::PARAM_INT);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }
    public function updateRepair($id, $price, $status, $end_date)
    {
        if ($end_date) {
            $query = 'UPDATE tcs.repairs SET price = :price, status = :status, end_date = :end_date WHERE id = :id';
            $stmt = $this->database->connect()->prepare($query);
            $stmt->bindParam(":price", $price, PDO::PARAM_INT);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":end_date", $end_date, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        } else {
            $query = 'UPDATE tcs.repairs SET price = :price, status = :status WHERE id = :id';
            $stmt = $this->database->connect()->prepare($query);
            $stmt->bindParam(":price", $id, PDO::PARAM_INT);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }
    public function endRepair($id, $client_id, $price, $mechanic_id, $invoice_no, $end_date)
    {
        $update_query = 'UPDATE tcs.repairs SET price = :price, status = 3, end_date = :end_date WHERE id = :id';
        $update_stmt = $this->database->connect()->prepare($update_query);
        $update_stmt->bindParam(":price", $id, PDO::PARAM_INT);
        $update_stmt->bindParam(":end_date", $end_date, PDO::PARAM_STR);
        $update_stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $insert_query = 'INSERT INTO tcs.invoices (invoice_no, user_id, repair_id, total, date, issuer_id) VALUES (:invoice_no, :client_id, :id, :price, :end_date, :mechanic_id)';
        $insert_stmt = $this->database->connect()->prepare($insert_query);
        $insert_stmt->bindParam(":invoice_no", $invoice_no, PDO::PARAM_STR);
        $insert_stmt->bindParam(":client_id", $client_id, PDO::PARAM_INT);
        $insert_stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $insert_stmt->bindParam(":price", $price, PDO::PARAM_INT);
        $insert_stmt->bindParam(":end_date", $end_date, PDO::PARAM_STR);
        $insert_stmt->bindParam(":mechanic_id", $mechanic_id, PDO::PARAM_INT);

        try {
            $update_stmt->execute();
            $insert_stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }
    public function deleteRepair($id)
    {
        $query = 'DELETE FROM tcs.repairs WHERE id = :id';
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
