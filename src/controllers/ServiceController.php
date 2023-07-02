<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/InvoiceRepository.php';

class ServiceController extends AppController
{
    private $invoiceRepository;

    public function __construct()
    {
        parent::__construct();
        $this->invoiceRepository = new InvoiceRepository();
    }
    public function services()
    {
        if (!isset($_SESSION['userId'])) {
            $this->render('login');
            return;
        }
        if ($_SESSION['userRole'] == 1 || $_SESSION['userRole'] == 2) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url");
            return;
        } else {
            $rentalHistory = $this->invoiceRepository->getClientRentalHistory($_SESSION['userId'], $_SESSION['userRole'] == 0 ? false : true);
            $repairHistory = $this->invoiceRepository->getClientRepairHistory($_SESSION['userId'], $_SESSION['userRole'] == 0 ? false : true);
            $this->render('services', ["headerMessage" => "Wykonane usługi", "rentalHistory" => $rentalHistory, "repairHistory" => $repairHistory]);
        }
    }
}
