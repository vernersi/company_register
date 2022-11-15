<?php
namespace App;

class CompanyCollection {
    public array $companies;

    public function addCompany(Company $company){
        $this->companies[]=$company;
    }

    public function getCompanies(): array
    {
        return $this->companies;
    }

    public function lastThirty():array {
        return array_slice($this->companies,-30);
    }

    public function searchByName($name){
        foreach ($this->companies as $company){
            if ($company->getName()===$name){
                return $company->getRegistrationNumber();
            }
        } return "Error 404, Name not found";
    }

    public function searchByReg($number){
        foreach ($this->companies as $company){
            if ($company->getRegistrationNumber()===$number){
                return $company->getName();
            }
        } return "Error 404, Reg Num not found";
    }

}