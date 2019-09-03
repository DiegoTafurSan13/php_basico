<?php
namespace model;
class Card
{
    private $nameArchivo;

    public function setNameArchivo(string $name)
    {
        $this->$nameArchivo=$name;
    }
    public function getNameArchivo():string
    {
        return $this->$nameArchivo;
    }
}

