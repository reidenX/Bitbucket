<?php
namespace Validate;

interface Validate {
    public function errormsg($input);
}

class EmptyError implements Validate {
    public function errormsg($input){
        if(empty($input)){
            echo "Please submit required data";
            exit();
        }
    }
}

class InvalidSkuFormat implements Validate {
    public function errormsg($input){
        if(preg_match("/^[a-zA-Z]+[0-9]+/", $input) == 0){
            echo "Please provide the data of indicated type";
            exit();
        }
    }
}

class InvalidNameFormat implements Validate {
    public function errormsg($input){
        if(preg_match("/[^a-zA-Z0-9\s]/", $input) == 1){
            echo "Please provide the data of indicated type";
            exit();
        }
    }
}

class InvalidPriceFormat implements Validate {
    public function errormsg($input){
        if(preg_match("/[^0-9]/", $input) == 1){
            echo "Please provide the data of indicated type";
            exit();
        }
    }
}

class ExistingSku implements Validate {
    public function errormsg($input){
        if($input == true){
            echo "Sku already Exist";
            exit();
        }
    }
}