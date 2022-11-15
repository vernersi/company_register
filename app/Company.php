<?php
namespace App;

class Company{

    private string $name;
    private string $registrationNumber;

    public function __construct(string $name, string $registrationNumber)
    {

        $this->name = $name;
        $this->registrationNumber = $registrationNumber;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
}