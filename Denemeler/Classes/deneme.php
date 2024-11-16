<?php

class Arabalar
{
    public $marka;
    public $model;
    public $yil;

    public function __construct($marka, $model, $yil)
    {
        $this->marka = $marka;
        $this->model = $model;
        $this->yil = $yil;

    }
    public function ekranaYaz()
    {
        foreach ($this as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }
    }
}
$araba1 = new Arabalar("Toyota", "Corolla", 2020);
$araba2 = new Arabalar("Honda", "Civic", 2021);

$araba1->ekranaYaz();
?>