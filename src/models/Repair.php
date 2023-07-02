<?php

class Repair
{
    private $id;
    private $client_id;
    private $status;
    private $car_registration;
    private $make;
    private $start_date;
    private $end_date;
    private $price;
    private $main_mechanic_id;
    private $name;
    private $email;
    private $phone;

    public function __construct($id, $client_id, $status, $car_registration, $make, $start_date, $end_date, $price, $main_mechanic_id, $name, $email, $phone)
    {
        $this->id = $id;
        $this->client_id = $client_id;
        $this->status = $status;
        $this->car_registration = $car_registration;
        $this->make = $make;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->price = $price;
        $this->main_mechanic_id = $main_mechanic_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id 
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClient_id()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id 
     * @return self
     */
    public function setClient_id($client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status 
     * @return self
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCar_registration()
    {
        return $this->car_registration;
    }

    /**
     * @param mixed $car_registration 
     * @return self
     */
    public function setCar_registration($car_registration): self
    {
        $this->car_registration = $car_registration;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param mixed $make 
     * @return self
     */
    public function setMake($make): self
    {
        $this->make = $make;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $start_date 
     * @return self
     */
    public function setStart_date($start_date): self
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnd_date()
    {
        return $this->end_date;
    }

    /**
     * @param mixed $end_date 
     * @return self
     */
    public function setEnd_date($end_date): self
    {
        $this->end_date = $end_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price 
     * @return self
     */
    public function setPrice($price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMain_mechanic_id()
    {
        return $this->main_mechanic_id;
    }

    /**
     * @param mixed $main_mechanic_id 
     * @return self
     */
    public function setMain_mechanic_id($main_mechanic_id): self
    {
        $this->main_mechanic_id = $main_mechanic_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name 
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email 
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone 
     * @return self
     */
    public function setPhone($phone): self
    {
        $this->phone = $phone;
        return $this;
    }
}
