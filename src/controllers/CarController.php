<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/CarRepository.php';
require_once __DIR__ . '/../repository/ClientRepository.php';
require_once __DIR__ . '/../repository/RentalRepository.php';

class CarController extends AppController
{
    private $carRepository;
    private $clientsRepository;
    private $rentalRepository;


    public function __construct()
    {
        parent::__construct();
        $this->carRepository = new CarRepository();
        $this->clientsRepository = new ClientRepository();
        $this->rentalRepository = new RentalRepository();
    }
    public function rent()
    {
        $count = $this->clientsRepository->getClientsNo();
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] > 1) {
            $rentals = $this->rentalRepository->getRentals();
            $this->render("rent", ["headerMessage" => "Wypożyczalnia samochodów", "rentals" => $rentals]);
            return;
        }

        $cars = $this->carRepository->getCars();
        $this->render("rent", ["headerMessage" => "Wypożyczalnia samochodów", "cars" => $cars]);
    }
    public function cars()
    {
        $cars = $this->carRepository->getCars();

        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($cars);
    }
    public function manageCars()
    {
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] > 1) {
            $cars = $this->carRepository->getCars();
            $this->render('cars', ["headerMessage" => "Samochody", "cars" => $cars]);
            return;
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url");
    }
    public function apiAddCar()
    {
        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $make = $_POST["make"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $color = $_POST["color"];
        $image = $_POST["image"];
        $registration = $_POST["registration"];
        $ppd = $_POST["ppd"];

        $res = $this->carRepository->addCar($make, $model, $year, $color, $image, $registration, $ppd);
        $cars = $this->carRepository->getCars();

        $this->render("cars", ["headerMessage" => "Samochody", "cars" => $cars, "message" => $res ? "Dodano samochód" : "Błąd dodawania samochodu"]);
    }
    public function apiUpdateCar()
    {
        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $requestBody = file_get_contents("php://input");

        $data = json_decode($requestBody, true);

        $id = $data["id"];
        $newImg = $data["newImg"];
        $newPpd = $data["newPpd"];

        $res = $this->carRepository->updateCar($id, $newImg, $newPpd);

        http_response_code($res ? 200 : 400);
    }
    public function apiDeleteCar()
    {
        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $requestBody = file_get_contents("php://input");

        $data = json_decode($requestBody, true);

        $id = $data["id"];

        $res = $this->carRepository->deleteCar($id);

        http_response_code($res ? 200 : 400);
    }
}
