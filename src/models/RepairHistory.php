<?php

class RepairHistory
{
    private $status;
    private $rep_id;
    private $car_registration;
    private $make;
    private $price;
    private $name;
    private $surname;
    private $start_date;
    private $end_date;
    private $main_mechanic_id;
    private $user_id;
    private $total;
    private $invoice_no;
    private $invoice_date;
    private $mechanicname;
    private $mechanicsurname;
    public function __construct($status, $rep_id, $car_registration, $make, $price, $name, $surname, $start_date, $end_date, $main_mechanic_id, $user_id, $total, $invoice_no, $invoice_date, $mechanicname, $mechanicsurname)
    {
        $this->status = $status;
        $this->rep_id = $rep_id;
        $this->car_registration = $car_registration;
        $this->make = $make;
        $this->price = $price;
        $this->name = $name;
        $this->surname = $surname;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->main_mechanic_id = $main_mechanic_id;
        $this->user_id = $user_id;
        $this->total = $total;
        $this->invoice_no = $invoice_no;
        $this->invoice_date = $invoice_date;
        $this->mechanicname = $mechanicname;
        $this->mechanicsurname = $mechanicsurname;
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
    public function getRep_id()
    {
        return $this->rep_id;
    }

    /**
     * @param mixed $rep_id 
     * @return self
     */
    public function setRep_id($rep_id): self
    {
        $this->rep_id = $rep_id;
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
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname 
     * @return self
     */
    public function setSurname($surname): self
    {
        $this->surname = $surname;
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
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id 
     * @return self
     */
    public function setUser_id($user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total 
     * @return self
     */
    public function setTotal($total): self
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoice_no()
    {
        return $this->invoice_no;
    }

    /**
     * @param mixed $invoice_no 
     * @return self
     */
    public function setInvoice_no($invoice_no): self
    {
        $this->invoice_no = $invoice_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMechanicname()
    {
        return $this->mechanicname;
    }

    /**
     * @param mixed $mechanicname 
     * @return self
     */
    public function setMechanicname($mechanicname): self
    {
        $this->mechanicname = $mechanicname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMechanicsurname()
    {
        return $this->mechanicsurname;
    }

    /**
     * @param mixed $mechanicsurname 
     * @return self
     */
    public function setMechanicsurname($mechanicsurname): self
    {
        $this->mechanicsurname = $mechanicsurname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoice_date()
    {
        return $this->invoice_date;
    }

    /**
     * @param mixed $invoice_date 
     * @return self
     */
    public function setInvoice_date($invoice_date): self
    {
        $this->invoice_date = $invoice_date;
        return $this;
    }
}
