<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class ManagementController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function users()
    {
        if (!isset($_SESSION['userId'])) {
            $this->render('login');
            return;
        }
        if ($_SESSION['userRole'] !== 3) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url");
            return;
        } else {
            $users = $this->userRepository->getUsers();
            $this->render('users', ["headerMessage" => "Użytkownicy", "users" => $users]);
        }
    }
    public function apiChangeUserRole()
    {

        if (!$this->isPost()) {
            return $this->render('landing');
        }

        $requestBody = file_get_contents("php://input");

        $data = json_decode($requestBody, true);

        $id = $data["id"];
        $newRole = $data["role"];

        $res = $this->userRepository->changeUserRole($id, $newRole);
        http_response_code($res ? 200 : 400);
    }
}
