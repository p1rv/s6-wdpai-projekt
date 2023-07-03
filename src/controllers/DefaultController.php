<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/ClientRepository.php';

class DefaultController extends AppController
{
    private $clientsRepository;
    private $count;

    public function __construct()
    {
        parent::__construct();
        $this->clientsRepository = new ClientRepository();
        $this->count = 12; //$this->clientsRepository->getClientsNo();
    }
    public function index()
    {
        // $this->render('landing', ["messages" => ["gsfdg"]]);
        $this->render('landing', ["headerMessage" => "Tylu z Was skorzystało już z naszych usług: " . $this->count]);
    }

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }
}
