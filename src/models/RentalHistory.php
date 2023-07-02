<?php

class RentalHistory
{
    private $car_id;
    private $ren_id;
    private $start_date;
    private $end_date;
    private $user_id;
    private $name;
    private $surname;
    private $total;
    private $invoice_no;
    private $invoice_date;
    private $make;
    private $model;
    private $registration;
    private $issuername;
    private $issuersurname;

    public function __construct($car_id, $ren_id, $start_date, $end_date, $user_id, $name, $surname, $total, $invoice_no, $invoice_date, $make, $model, $registration, $issuername, $issuersurname)
    {
        $this->car_id = $car_id;
        $this->ren_id = $ren_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->surname = $surname;
        $this->total = $total;
        $this->invoice_no = $invoice_no;
        $this->invoice_date = $invoice_date;
        $this->make = $make;
        $this->model = $model;
        $this->registration = $registration;
        $this->issuername = $issuername;
        $this->issuersurname = $issuersurname;
    }

    /**
     * @return mixed
     */
    public function getCar_id()
    {
        return $this->car_id;
    }

    /**
     * @param mixed $car_id 
     * @return self
     */
    public function setCar_id($car_id): self
    {
        $this->car_id = $car_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRen_id()
    {
        return $this->ren_id;
    }

    /**
     * @param mixed $ren_id 
     * @return self
     */
    public function setRen_id($ren_id): self
    {
        $this->ren_id = $ren_id;
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
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model 
     * @return self
     */
    public function setModel($model): self
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     * @param mixed $registration 
     * @return self
     */
    public function setRegistration($registration): self
    {
        $this->registration = $registration;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssuername()
    {
        return $this->issuername;
    }

    /**
     * @param mixed $issuername 
     * @return self
     */
    public function setIssuername($issuername): self
    {
        $this->issuername = $issuername;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssuersurname()
    {
        return $this->issuersurname;
    }

    /**
     * @param mixed $issuersurname 
     * @return self
     */
    public function setIssuersurname($issuersurname): self
    {
        $this->issuersurname = $issuersurname;
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
