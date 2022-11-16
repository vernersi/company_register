<?php
require_once "vendor/autoload.php";

use App\Company;
use League\Csv\Reader;
use League\Csv\Statement;


$companies = new \App\CompanyCollection();
//$csv= file('https://data.gov.lv/dati/dataset/4de9697f-850b-45ec-8bba-61fa09ce932f/resource/25e80bf3-f107-4ab4-89ef-251b5b9374e9/download/register.csv');
$file = new \App\File('register.csv',';');
foreach ($file->getRecords() as $record) {
    $companies->addCompany(new Company($record["name"], $record["regcode"]));
}
while(true){
echo "[1] Print last 30 elements" . PHP_EOL .
    "[2] Search company by name" . PHP_EOL .
    "[3] Search company by registration code" . PHP_EOL .
    "[4] Exit App" . PHP_EOL;
$selection = readline('Choose your options: ');
switch ($selection) {
    case 1:
        foreach ($companies->lastThirty() as $company) {
            echo "Company name : " . $company->getName() . " | Registration number:" . $company->getRegistrationNumber() . PHP_EOL;
        }
        break;
    case 2:
        $companyName = readline('Enter company Name :');
        echo "Company registration number is :" . $companies->searchByName($companyName) . PHP_EOL;
        break;
    case 3:
        $companyReg = readline('Enter company Reg Number :');
        echo "Company name you are looking for is : " . $companies->searchByReg($companyReg) . PHP_EOL;
        break;
    case 4: exit;
}
}


