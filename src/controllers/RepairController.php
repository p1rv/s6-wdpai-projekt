<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/RepairRepository.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../models/Repair.php';

class RepairController extends AppController
{
    private $repairRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->repairRepository = new RepairRepository();
        $this->userRepository = new UserRepository();
    }
    public function manageRepairs()
    {
        if (!isset($_SESSION['userId']) || $_SESSION['userRole'] !== 1) {
            $this->render('landing');
            return;
        }

        $repairs = $this->repairRepository->getRepairs($_SESSION["userId"]);
        $users = $this->userRepository->getUsersEmails();
        $this->render('manageRepairs', ["headerMessage" => "Naprawy", "repairs" => $repairs, "users" => $users]);
    }
    public function apiAddRepair()
    {
        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $id = $_POST["id"];
        $make = $_POST["make"];
        $car_registration = $_POST["car_registration"];
        $price = $_POST["price"];
        $end_date = $_POST["end_date"];

        $res = $this->repairRepository->addRepair($id, $make, $car_registration, $price, $_SESSION['userId'], date('Y-m-d'), $end_date);
        $repairs = $this->repairRepository->getRepairs($_SESSION["userId"]);
        $users = $this->userRepository->getUsersEmails();

        $this->render("manageRepairs", ["headerMessage" => "Naprawy", "repairs" => $repairs, "users" => $users, "message" => $res ? "Dodano naprawę" : "Błąd dodawania naprawy, sprawdź dane"]);
    }
    public function apiUpdateRepair()
    {
        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $requestBody = file_get_contents("php://input");

        $data = json_decode($requestBody, true);

        $id = $data["id"];
        $price = $data["price"];
        $status = $data["status"];
        $end_date = $data["end_date"];
        $client_id = $data["client_id"];

        if ($status !== 3) {
            $res = $this->repairRepository->updateRepair($id, $price, $status, $end_date);
        } else {
            $res = $this->repairRepository->endRepair($id, $client_id, $price, $_SESSION['userId'], uniqid(), date("Y-m-d"));
        }

        http_response_code($res ? 200 : 400);
    }
    public function apiDeleteRepair()
    {
        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $requestBody = file_get_contents("php://input");

        $data = json_decode($requestBody, true);

        $id = $data["id"];

        $res = $this->repairRepository->deleteRepair($id);

        http_response_code($res ? 200 : 400);
    }
}
