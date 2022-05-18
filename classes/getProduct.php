<?php

class ProductInfo {
    protected $data;

    public fucntion __construct($data){
        $this-data = $data;
    }

    function productData() {
        echo $this-data;
    }
}

class DVD extends ProductInfo {
    function productData(){
        echo $this->data;
    }
}

class Name extends ProductInfo {
    function productData(){
        echo $this-data();
    }
}

class Price extends ProductInfo {
    function productData(){
        echo $this-data();
    }
}

class Option extends ProductInfo {
    function productData(){
        echo $this-data();
    }
}