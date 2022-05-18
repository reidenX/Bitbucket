<?php
namespace Classes\Viewer;

class ProductViewer {
    private $sku;
    private $name;
    private $price;
    private $option;

    public function __construct($newSku, $newName, $newPrice, $newOption){
        $this->sku = $newSku;
        $this->name = $newName;
        $this->price = $newPrice;
        $this->option = $newOption;
    }

    public function getSku(){
        return $this->sku;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getOption(){
        return $this->option;
    }
}