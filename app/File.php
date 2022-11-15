<?php
namespace App;
use League\Csv\Reader;
use League\Csv\Statement;


class File {


    private string $url;
    private array $header;
    private array $records=[];
    private string $delimiter;

    public function __construct(string $url, string $delimiter)
    {

        $this->url = $url;
        $this->delimiter = $delimiter;
    }

    public function getRecords():array{
        $csv = Reader::createFromPath($this->url);
        $csv->setDelimiter($this->delimiter);
        $csv->setHeaderOffset(0);
        $this->header=$csv->getHeader();
        foreach($records=$csv->getRecords() as $record){
            $this->records[]=$record;
        } return $this->records;
    }



}
