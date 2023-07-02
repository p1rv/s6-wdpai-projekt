<?php

class Rental
{
	private $id;
	private $userId;
	private $start_date;
	private $end_date;
	private $email;
	private $name;
	private $surname;
	private $phone;
	private $carId;
	private $make;
	private $model;
	private $registration;
	private $status;
	private $image;
	private $ppd;
	private $price;

	public function __construct(int $id, int $userId, string $start_date, string $end_date, string $email, string $name, string $surname, ?string $phone, int $carId, string $make, string $model, string $image, string $registration, int $status, int $ppd)
	{
		$this->id = $id;
		$this->userId = $userId;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->email = $email;
		$this->name = $name;
		$this->surname = $surname;
		$this->phone = $phone;
		$this->carId = $carId;
		$this->make = $make;
		$this->model = $model;
		$this->image = $image;
		$this->registration = $registration;
		$this->status = $status;
		$this->ppd = $ppd;
		$this->price = $ppd * (1 + DateTime::createFromFormat('Y-m-d', $start_date)->diff(DateTime::createFromFormat('Y-m-d', $end_date))->format("%a"));
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
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * @param mixed $image 
	 * @return self
	 */
	public function setImage($image): self
	{
		$this->image = $image;
		return $this;
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
	public function getPpd()
	{
		return $this->ppd;
	}

	/**
	 * @param mixed $ppd 
	 * @return self
	 */
	public function setPpd($ppd): self
	{
		$this->ppd = $ppd;
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
	public function getUserId()
	{
		return $this->userId;
	}

	/**
	 * @param mixed $userId 
	 * @return self
	 */
	public function setUserId($userId): self
	{
		$this->userId = $userId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCarId()
	{
		return $this->carId;
	}

	/**
	 * @param mixed $carId 
	 * @return self
	 */
	public function setCarId($carId): self
	{
		$this->carId = $carId;
		return $this;
	}
}
