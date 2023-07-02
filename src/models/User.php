<?php

class User
{
	private $id;
	private $email;
	private $phone;
	private $password;
	private $role;
	private $name;
	private $surname;
	private $city;
	private $street;
	private $house_no;
	private $flat_no;
	private $pesel;
	private $postal_code;

	public function __construct(int $id, string $email, ?string $phone, string $password, int $role, string $name, string $surname, string $city, ?string $street, string $house_no, ?string $flat_no, ?string $pesel, string $postal_code)
	{
		$this->id = $id;
		$this->email = $email;
		$this->phone = $phone;
		$this->password = $password;
		$this->role = $role;
		$this->name = $name;
		$this->surname = $surname;
		$this->city = $city;
		$this->street = $street;
		$this->house_no = $house_no;
		$this->flat_no = $flat_no;
		$this->pesel = $pesel;
		$this->postal_code = $postal_code;
	}

	public function getId(): int
	{
		return $this->id;
	}
	public function setId(int $id)
	{
		return $this->id = $id;
	}

	public function getEmail(): string
	{
		return $this->email;
	}
	public function setEmail(string $email)
	{
		return $this->email = $email;
	}

	public function getPhone(): ?string
	{
		return $this->phone;
	}
	public function setPhone(string $phone)
	{
		return $this->phone = $phone;
	}

	public function getRole(): int
	{
		return $this->role;
	}
	public function setRole(int $role)
	{
		return $this->role = $role;
	}
	public function getPassword(): string
	{
		return $this->password;
	}
	public function setPassword(string $password)
	{
		return $this->password = $password;
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
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @param mixed $city 
	 * @return self
	 */
	public function setCity($city): self
	{
		$this->city = $city;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * @param mixed $street 
	 * @return self
	 */
	public function setStreet($street): self
	{
		$this->street = $street;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getHouse_no()
	{
		return $this->house_no;
	}

	/**
	 * @param mixed $house_no 
	 * @return self
	 */
	public function setHouse_no($house_no): self
	{
		$this->house_no = $house_no;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFlat_no()
	{
		return $this->flat_no;
	}

	/**
	 * @param mixed $flat_no 
	 * @return self
	 */
	public function setFlat_no($flat_no): self
	{
		$this->flat_no = $flat_no;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPesel()
	{
		return $this->pesel;
	}

	/**
	 * @param mixed $pesel 
	 * @return self
	 */
	public function setPesel($pesel): self
	{
		$this->pesel = $pesel;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPostal_code()
	{
		return $this->postal_code;
	}

	/**
	 * @param mixed $postal_code 
	 * @return self
	 */
	public function setPostal_code($postal_code): self
	{
		$this->postal_code = $postal_code;
		return $this;
	}
}
