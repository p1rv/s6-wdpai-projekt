<?php

require_once "Repository.php";
require_once __DIR__ . '/../models/Invoice.php';
require_once __DIR__ . '/../models/RentalHistory.php';
require_once __DIR__ . '/../models/RepairHistory.php';

class InvoiceRepository extends Repository
{
    public function getClientRentalHistory($id, $admin)
    {
        $query = 'SELECT 
        ren.car_id, ren.id as ren_id, ren.start_date, ren.end_date, 
        u.id as user_id, u.name, u.surname,
        i.total, i.invoice_no, i.date as invoice_date, 
        c.make, c.model, c.registration, 
        ui.name as issuername, ui.surname as issuersurname
        FROM tcs.rentals ren
        INNER JOIN tcs.users u ON u.id = ren.client_id
        LEFT JOIN tcs.cars c ON ren.car_id = c.id
        LEFT JOIN tcs.invoices i ON i.rental_id = ren.id
        LEFT JOIN tcs.users ui ON i.issuer_id = ui.id ';
        if ($admin) {
            $stmt = $this->database->connect()->prepare($query);
        } else {
            $query .= ' WHERE u.id = :id';
            $stmt = $this->database->connect()->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        $result = [];

        $rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rentals as $rental) {
            $result[] = new RentalHistory($rental["car_id"], $rental["ren_id"], $rental["start_date"], $rental["end_date"], $rental["user_id"], $rental["name"], $rental["surname"], $rental["total"], $rental["invoice_no"], $rental["invoice_date"], $rental["make"], $rental["model"], $rental["registration"], $rental["issuername"], $rental["issuersurname"]);
        }

        return $result;
    }
    public function getClientRepairHistory($id, $admin)
    {
        $query = 'SELECT rep.status, rep.id as rep_id, rep.car_registration, rep.make, rep.price, u.name, u.surname, rep.start_date, rep.end_date, rep.main_mechanic_id,
        u.id as user_id, i.total, i.invoice_no, i.date as invoice_date,
        ui.name as mechanicname, ui.surname as mechanicsurname 
        FROM tcs.repairs rep
        INNER JOIN tcs.users u ON u.id = rep.client_id
        LEFT JOIN tcs.invoices i ON i.repair_id = rep.id
        LEFT JOIN tcs.users ui ON rep.main_mechanic_id = ui.id';
        if ($admin) {
            $stmt = $this->database->connect()->prepare($query);
        } else {
            $query .= ' WHERE u.id = :id';
            $stmt = $this->database->connect()->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        $result = [];

        $repairs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($repairs as $repair) {
            $result[] = new RepairHistory($repair["status"], $repair["rep_id"], $repair["car_registration"], $repair["make"], $repair["price"], $repair["name"], $repair["surname"], $repair["start_date"], $repair["end_date"], $repair["main_mechanic_id"], $repair["user_id"], $repair["total"], $repair["invoice_no"], $repair["invoice_date"], $repair["mechanicname"], $repair["mechanicsurname"]);
        }

        return $result;
    }
}
