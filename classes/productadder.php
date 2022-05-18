<?php
namespace Classes\Adder;

class Products {
    private $sku;
    private $name;
    private $price;
    private $option;

    public function __construct($sku, $name, $price, $option){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->option = $option;
    }

    function addSku(){
        return $this->sku;
    }

    function addName(){
        return $this->name;
    }

    function addPrice(){
        return $this->price;
    }

    function addOption(){
        return $this->option;
    }
}