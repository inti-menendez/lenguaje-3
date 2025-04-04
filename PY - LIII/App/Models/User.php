<?php
class User
{

    public function __construct(
        private $id,
        private $name,
        private $lastName,
        private $username,
        private $email,
        private $telephone,
        private $password,
        private $status,
        private $role
    ) {}

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getRole()
    {
        return $this->role;
    }
}
