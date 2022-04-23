<?php

namespace App\Entities;

class UserEntity
{
    private $name;
    private $email;
    private $password;

    /**
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function toArray()
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password
        ];
    }
}
