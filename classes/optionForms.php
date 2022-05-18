<?php
namespace TypeSwitcher;

interface SwitchTypes {
    public function renderOption($input);
}

class DVD implements SwitchTypes {
    public function renderOption($input){
        if($input == "DVD"){
            echo 
            "
                <div class='switchInputsDiv'>
                    <label for='DVD'>Size (MB)</label>
                    <input type='text' name='size' id='size'>
                </div>
                <p>Please provide size</p>    
            "
            ;
        }
    }
}

class Furniture implements SwitchTypes {
    public function renderOption($input){
        if($input == "Furniture"){
            echo 
            "
                <div class='switchInputs furniture' id='Furniture'>
                    <div>
                        <label for='height'><p>Height (CM)</p></label>
                        <input type='text' name='height' class='furnitureHeight' id='height'>
                    </div>
                    
                    <div>
                        <label for='width'><p>Width (CM)</p></label>
                        <input type='text' name='width' class='furnitureWidth' id='width'>
                    </div>

                    <div>
                        <label for='length'><p>Length (CM)</p></label>
                        <input type='text' name='length' class='furnitureLength' id='length'>
                    </div>
                    <p class='switchInputsDesc'>Please provide the dimensions</p>
                </div>
            ";
        }
    }
}

class Book implements SwitchTypes {
    public function renderOption($input){
        if($input == "Book"){
            echo 
            "
                <div class='switchInputs book' id='Book'>
                    <div>
                        <label for='book'><p>Weight (KG))</p></label>
                        <input type='text' name='book' class='bookInput' id='weight'>
                    </div>
                    <p class='switchInputsDesc'>Please provide weight</p>
                </div>
            ";
        }
        
    }
}

if(isset($_POST['typeSwitcher'])){
    $dvd = new DVD();
    $dvd->renderOption($_POST['typeSwitcher']);

    $furniture = new Furniture();
    $furniture->renderOption($_POST['typeSwitcher']);

    $book = new Book();
    $book->renderOption($_POST['typeSwitcher']);
}