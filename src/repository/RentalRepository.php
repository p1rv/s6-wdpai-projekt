<?php

require_once "Repository.php";
require_once __DIR__ . '/../models/Rental.php';

class RentalRepository extends Repository
{
    public function handleRent($carId, $userId, $startDate, $endDate)
    {
        $insert_stmt = $this->database->connect()->prepare('INSERT INTO "tcs"."rentals" ("car_id", "client_id", "start_date", "end_date") VALUES (:carId, :userId, :startDate, :endDate)');

        $insert_stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
        $insert_stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $insert_stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $insert_stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);

        $update_stmt = $this->database->connect()->prepare('UPDATE tcs.cars SET "status" = 1 WHERE "id" = :carId');
        $update_stmt->bindParam(':carId', $carId, PDO::PARAM_INT);

        try {
            $insert_stmt->execute();
            $update_stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }

    public function handleReturn($rentalId, $userId, $price, $issuerId, $carId)
    {
        $update_stmt = $this->database->connect()->prepare('UPDATE tcs.cars SET "status" = 0 WHERE id = :id');
        $update_stmt->bindParam(':id', $carId, PDO::PARAM_INT);

        $insert_stmt = $this->database->connect()->prepare('INSERT INTO tcs.invoices (invoice_no, user_id, rental_id, total, "date", issuer_id) VALUES (:invoice_no, :user_id, :rental_id, :total, :issue_date, :issuer_id)');
        $insert_stmt->bindParam(':invoice_no', uniqid(), PDO::PARAM_STR);
        $insert_stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $insert_stmt->bindParam(':rental_id', $rentalId, PDO::PARAM_INT);
        $insert_stmt->bindParam(':total', $price, PDO::PARAM_INT);
        $insert_stmt->bindParam(':issue_date', date('Y-m-d'), PDO::PARAM_STR);
        $insert_stmt->bindParam(':issuer_id', $issuerId, PDO::PARAM_STR);
        try {
            $update_stmt->execute();
            $insert_stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }

    public function getRentals()
    {
        $query = 'SELECT
        r.id, r.start_date, r.end_date, 
        u.id as userId, u.email, u.name, u.surname, u.phone, 
        c.id as carid, c.make, c.model, c.registration, c.status, c.image, c.ppd
        FROM tcs.rentals r 
        INNER JOIN tcs.users u 
        ON r.client_id = u.id 
        INNER JOIN tcs.cars c 
        ON r.car_id = c.id 
        WHERE c.status = 1 
        OR NOT EXISTS (
            SELECT 1 FROM tcs.invoices i 
            WHERE i.rental_id = r.id
        )';
        $stmt = $this->database->connect()->prepare($query);

        $stmt->execute();
        $result = [];

        $rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rentals as $rental) {
            $result[] = new Rental($rental["id"], $rental["userid"], $rental["start_date"], $rental["end_date"], $rental["email"], $rental["name"], $rental["surname"], $rental["phone"], $rental["carid"], $rental["make"], $rental["model"], $rental["image"], $rental["registration"], $rental["status"], $rental["ppd"]);
        }

        return $result;
    }
}
