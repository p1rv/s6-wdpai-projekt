<?php

class Car{
    private $id;
    private $make;
    private $model;
    private $year;
    private $color;
    private $image;
    private $registration;
    private $status;
    private $ppd;
    
    public function __construct(int $id, string $make, string $model, int $year, ?string $color, string $image, string $registration, int $status, int $ppd){
        $this->id = $id;
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->image = $image;
        $this->registration = $registration;
        $this->status = $status;
        $this->ppd = $ppd;
    }

    public function getId(): string{
        return $this->id;
    }
    public function setId(string $id){
        return $this->id = $id;
    }

	/**
	 * @return mixed
	 */
	public function getMake() {
		return $this->make;
	}
	
	/**
	 * @param mixed $make 
	 * @return self
	 */
	public function setMake($make): self {
		$this->make = $make;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getColor() {
		return $this->color;
	}
	
	/**
	 * @param mixed $color 
	 * @return self
	 */
	public function setColor($color): self {
		$this->color = $color;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * @param mixed $image 
	 * @return self
	 */
	public function setImage($image): self {
		$this->image = $image;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getYear() {
		return $this->year;
	}
	
	/**
	 * @param mixed $year 
	 * @return self
	 */
	public function setYear($year): self {
		$this->year = $year;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getModel() {
		return $this->model;
	}
	
	/**
	 * @param mixed $model 
	 * @return self
	 */
	public function setModel($model): self {
		$this->model = $model;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRegistration() {
		return $this->registration;
	}
	
	/**
	 * @param mixed $registration 
	 * @return self
	 */
	public function setRegistration($registration): self {
		$this->registration = $registration;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * @param mixed $status 
	 * @return self
	 */
	public function setStatus($status): self {
		$this->status = $status;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPpd() {
		return $this->ppd;
	}
	
	/**
	 * @param mixed $ppd 
	 * @return self
	 */
	public function setPpd($ppd): self {
		$this->ppd = $ppd;
		return $this;
	}
}