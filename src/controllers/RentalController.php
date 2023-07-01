<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/RentalRepository.php';

class RentalController extends AppController{
    private $rentalRepository;

    public function __construct(){
        parent::__construct();
        $this->rentalRepository = new RentalRepository();
    }
    public function apiRent() {
    if(!$this->isPost()){
        return null;
    }

    $userId = $_SESSION["userId"];
    $requestBody = file_get_contents("php://input");

    $data = json_decode($requestBody, true);
    
    $carId = $data["carId"];
    $startDate = $data["startDate"];
    $endDate = $data["endDate"];
    
    $res = $this->rentalRepository->handleRent($carId, $userId, $startDate, $endDate);
    http_response_code($res ? 200 : 400);
    }
    public function apiReturn() {
    if(!$this->isPost()){
        return null;
    }

    $issuerId = $_SESSION["userId"];
    $requestBody = file_get_contents("php://input");

    $data = json_decode($requestBody, true);
    
    $rentalId = $data["rentalId"];
    $userId = $data["userId"];
    $price = $data["price"];
    $carId = $data["carId"];
    
    $res = $this->rentalRepository->handleReturn($rentalId, $userId, $price, $issuerId, $carId);
    http_response_code($res ? 200 : 400);
    }
}