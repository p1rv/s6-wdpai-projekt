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
}
