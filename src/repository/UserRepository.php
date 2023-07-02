<?php

require_once "Repository.php";
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $login): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM tcs.users WHERE email = :input OR phone::text = :input');
        $stmt->bindParam(':input', $login, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User($user['id'], $user['email'], $user['phone'], $user['password'], $user['role'], $user['name'], $user['surname'], $user['city'], $user['street'], $user['house_no'], $user['flat_no'], $user['pesel'], $user['postal_code']);
    }

    public function getUserById($id)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM tcs.users WHERE id = :id');
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
            return null;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User($user['id'], $user['email'], $user['phone'], $user['password'], $user['role'], $user['name'], $user['surname'], $user['city'], $user['street'], $user['house_no'], $user['flat_no'], $user['pesel'], $user['postal_code']);
    }

    public function addUser($login, $password, $name, $surname, $phone, $city, $street, $house_no, $flat_no, $postal_code, $pesel)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO tcs.users ("email", "password", "name", "surname", "phone", "city", "street", "house_no", "flat_no", "postal_code", "pesel") VALUES (:email, :pass, :name, :surname, :phone, :city, :street, :house_no, :flat_no, :postal_code, :pesel)');
        $stmt->bindParam(':email', $login, PDO::PARAM_STR);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':pass', $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':street', $street, PDO::PARAM_STR);
        $stmt->bindParam(':house_no', $house_no, PDO::PARAM_STR);
        $stmt->bindParam(':flat_no', $flat_no, PDO::PARAM_STR);
        $stmt->bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
        $stmt->bindParam(':pesel', $pesel, PDO::PARAM_STR);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
        return true;
    }
}
