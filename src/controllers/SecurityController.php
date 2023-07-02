<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }
    public function apiLogin()
    {

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST["login"];
        $password = $_POST["password"];

        $user = $this->userRepository->getUser($login);

        if (!$user) {
            return $this->render("login", ["messages" => ["User with that login doesn't exist"]]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ["Incorrect password"]]);
        }

        $_SESSION['userId'] = $user->getId();
        $_SESSION['userEmail'] = $user->getEmail();
        $_SESSION['userRole'] = $user->getRole();

        // return $this->render('landing');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url");
    }
    public function apiRegister()
    {

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $password = $_POST["password"];
        $password_rep = $_POST["password-rep"];

        if ($password !== $password_rep) {
            return $this->render("register", ["messages" => ["Passwords are not equal"]]);
        }

        $login = $_POST["login"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $phone = $_POST["phone"];
        $city = $_POST["city"];
        $street = $_POST["street"];
        $house_no = $_POST["house_no"];
        $flat_no = $_POST["flat_no"];
        $postal_code = $_POST["postal_code"];
        $pesel = $_POST["pesel"];

        $res = $this->userRepository->addUser($login, $password, $name, $surname, $phone, $city, $street, $house_no, $flat_no, $postal_code, $pesel);

        return $res ? $this->render("login", ["messages" => ["Rejestracja przebiegła pomyślnie"]]) : $this->render("register", ["messages" => ["Błąd w czasie rejestracji, adres email prawdopodobnie w użyciu"]]);
    }
    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url");
    }

    public function account()
    {
        if (isset($_SESSION['userId'])) {
            $user = $this->userRepository->getUserById($_SESSION['userId']);
            $this->render('account', ["headerMessage" => "Panel użytkownika", "user" => $user]);
            return;
        }
        $this->render('login');
    }
}
