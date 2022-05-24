<?php
include "validate.php";
include "../controllers/accessDatabase.php";

use Validate\EmptyError;
use Validate\InvalidSkuFormat;
use Validate\InvalidNameFormat;
use Validate\InvalidPriceFormat;
use Validate\ExistingSku;
use Controllers\Database\SkuChecker;

class InitializeValidation {
    protected $save = 'save';

    public function initialize($isset){
        
    }
}

class SkuVal extends InitializeValidation {
    public function initialize($isset){

        if(isset($_POST[$this->save])){

            if(isset($_POST[$isset])){
                $emptyerror = new EmptyError();
                $emptyerror->errormsg($_POST[$isset]);
        
                $invalidsku = new InvalidSkuFormat();
                $invalidsku->errormsg($_POST[$isset]);
        
                $skuChecker = new SkuChecker();
                $skuExist = new ExistingSku();
                $skuExist->errormsg($skuChecker->check($_POST[$isset]));
            }
        }else {
            echo 'Something went wrong';
        }

    }
}

class NameVal extends InitializeValidation {

    public function initialize($isset){

        if(isset($_POST[$this->save])){
            if(isset($_POST[$isset])){
                $emptyerror = new EmptyError();
                $emptyerror->errormsg($_POST[$isset]);
        
                $formaterror = new InvalidNameFormat();
                $formaterror->errormsg($_POST[$isset]);
            }
        }else {
            echo 'Something went wrong';
        }

    }
}

class PriceVal extends InitializeValidation {
    public function initialize($isset){

        if(isset($_POST[$this->save])){
            
            if(isset($_POST[$isset])){
                $emptyerror = new EmptyError();
                $emptyerror->errormsg($_POST[$isset]);
        
                $formaterror = new InvalidPriceFormat();
                $formaterror->errormsg($_POST[$isset]);
            }
        }else {
            echo 'Something went wrong';
        }

    }
}

class SizeVal extends InitializeValidation {

    public function initialize($isset){

        if(isset($_POST[$this->save])){
            if(isset($_POST[$isset])){
                $emptyerror = new EmptyError();
                $emptyerror->errormsg($_POST[$isset]);
        
                $formaterror = new InvalidPriceFormat();
                $formaterror->errormsg($_POST[$isset]);
            }
        }else {
            echo 'Something went wrong';
        }

    }
}

class DimensionVal extends InitializeValidation {
    public function initialize($isset){

    }

    public function noDimensionInput($width, $height, $length){
        if(isset($_POST[$this->save])){

            if(isset($_POST[$width]) && isset($_POST[$height]) && isset($_POST[$length])){

                $emptyerror = new EmptyError();
                $emptyerror->errormsg($_POST[$width] && $_POST[$height] && $_POST[$length]);
        
                $formaterror = new InvalidPriceFormat();
                $formaterror->errormsg($_POST[$width]);
                $formaterror->errormsg($_POST[$height]);
                $formaterror->errormsg($_POST[$length]);

            }

        }else {
            echo 'Something went wrong';
        }
    }
}

class WeightVal extends InitializeValidation {

    public function initialize($isset){

        if(isset($_POST[$this->save])){

            if(isset($_POST[$isset])){
                $emptyerror = new EmptyError();
                $emptyerror->errormsg($_POST[$isset]);
                
                $formaterror = new InvalidPriceFormat();
                $formaterror->errormsg($_POST[$isset]);
            }

        }else {
            echo 'Something went wrong';
        }
    }
}

class OptionVal extends InitializeValidation {
    public function initialize($isset){
        
    }

    public function noOptionInput($size, $width, $height, $length, $weight){

        if(isset($_POST[$this->save])){

            if(!isset($_POST[$size]) && !isset($_POST[$width]) && !isset($_POST[$height]) && !isset($_POST[$length]) && !isset($_POST[$weight])){
                if(isset($_POST['noInput'])){
                    $emptyerror = new EmptyError();
                    $emptyerror->errormsg($_POST['noInput']);
                }
            }
            
        }else {
            echo 'Something went wrong';
        }
    }
}



$skuValidation = new SkuVal();
$skuValidation->initialize('sku');

$nameValidation = new NameVal();
$nameValidation->initialize('name');

$priceValidation = new PriceVal();
$priceValidation->initialize('price');

$sizeValidation = new SizeVal();
$sizeValidation->initialize('size');

$weightValidation = new WeightVal();
$weightValidation->initialize('weight');

$dimensionValidation = new DimensionVal();
$dimensionValidation->noDimensionInput('width', 'height', 'length');

$optionValidation = new OptionVal();
$optionValidation->noOptionInput('size', 'width', 'height', 'length', 'weight');




//=======BACKUP========
// if(isset($_POST['save'])){
    
//     if(isset($_POST['sku'])){
//         $emptyerror = new EmptyError();
//         $emptyerror->errormsg($_POST['sku']);

//         $invalidsku = new InvalidSkuFormat();
//         $invalidsku->errormsg($_POST['sku']);

//         $skuChecker = new SkuChecker();
//         $skuExist = new ExistingSku();
//         $skuExist->errormsg($skuChecker->check($_POST['sku']));
//     }

//     if(isset($_POST['name'])){
//         $emptyerror = new EmptyError();
//         $emptyerror->errormsg($_POST['name']);

//         $formaterror = new InvalidNameFormat();
//         $formaterror->errormsg($_POST['name']);
//     }

//     if(isset($_POST['price'])){
//         $emptyerror = new EmptyError();
//         $emptyerror->errormsg($_POST['price']);

//         $formaterror = new InvalidPriceFormat();
//         $formaterror->errormsg($_POST['price']);
//     }

//     if(isset($_POST['size'])){
//         $emptyerror = new EmptyError();
//         $emptyerror->errormsg($_POST['size']);

//         $formaterror = new InvalidPriceFormat();
//         $formaterror->errormsg($_POST['size']);
//     }
    
//     if(isset($_POST['width']) && isset($_POST['height']) && isset($_POST['length'])){
//         $emptyerror = new EmptyError();
//         $emptyerror->errormsg($_POST['width'] && $_POST['height'] && $_POST['length']);

//         $formaterror = new InvalidPriceFormat();
//         $formaterror->errormsg($_POST['width']);
//         $formaterror->errormsg($_POST['length']);
//         $formaterror->errormsg($_POST['height']);
//     }
    
//     if(!isset($_POST['width']) && !isset($_POST['height']) && !isset($_POST['length']) && !isset($_POST['weight']) && !isset($_POST['size'])){
//         if(isset($_POST['noInput'])){
//             $emptyerror = new EmptyError();
//             $emptyerror->errormsg($_POST['noInput']);
//         }
//     }
    
//     if(isset($_POST['weight'])){
//         $emptyerror = new EmptyError();
//         $emptyerror->errormsg($_POST['weight']);
        
//         $formaterror = new InvalidPriceFormat();
//         $formaterror->errormsg($_POST['weight']);
//     }

// }else {
//     echo "Something went wrong";
// }