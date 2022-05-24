<?php
namespace Controllers\Database;

use Classes\Viewer\ProductViewer;
use Classes\Adder\Products;

class Database {
    protected $dbServername;
    protected $dbUsername;
    protected $dbPassword;
    protected $dbName;
    protected $conn;
    

    public function __construct(){
        $this->dbServername = "sql309.epizy.com";
        $this->dbUsername = "epiz_31546682";
        $this->dbPassword = "sL71ZBndAm";
        $this->dbName = "epiz_31546682_productlist";

        $this->conn = mysqli_connect($this->dbServername, $this->dbUsername, $this->dbPassword, $this->dbName);
    }

    public function access(){

    }
}

class View extends Database {
    public function access(){
        $sql = "SELECT * FROM products;";
        $result = mysqli_query($this->conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            require "classes/productviewer.php";

            while ($row = mysqli_fetch_assoc($result)) {
            $product = new ProductViewer($row['sku'], $row['name'], $row['price'], $row['optiontype']);
            echo "<div class=\"products\">
            <input class=\"delete-checkbox\" type=\"checkbox\" name=\"products[]\" value={$product->getSku()}>
            <p>{$product->getSku()}</p>
            <p>{$product->getName()}</p>
            <p>{$product->getPrice()}.00 $</p>
            <p>{$product->getOption()}</p>
            </div>";
            }
        }
    }
}

class Add extends Database {
    public function access(){
        
    }

    public function add($sku, $name, $option){

        if(isset($_POST[$sku]) && isset($_POST[$name]) && isset($_POST[$option])){
            require "../classes/productadder.php";
        
            $newProduct = new Products($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['option']);

            $sql = "INSERT INTO products (sku, name, price, optiontype) VALUES ('{$newProduct->addSku()}',
            '{$newProduct->addName()}', '{$newProduct->addPrice()}', '{$newProduct->addOption()}');";
            mysqli_query($this->conn, $sql);
        }

    }
}

class Delete extends Database {
    public function access(){
        
    }

    public function delete($deletButton){

        if(isset($_POST[$deletButton])){
            if(isset($_POST['selectedProducts'])){
                $products = $_POST['selectedProducts'];
                for($i = 0; $i < count($products); $i++){
                    $sql = "DELETE FROM products WHERE sku='{$products[$i]}';";
                    mysqli_query($this->conn, $sql);
                }
            }
        }

    }
}

class SkuChecker extends Database {
    public function access(){}

    public function check($sku){
        $sql = "SELECT * FROM products WHERE sku  = '{$sku}';";
        $result = mysqli_query($this->conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            return true;
        }else{
            return false;
        }
    }
}

//deletes from database
$deleteProduct = new Delete();
$deleteProduct->delete('deleteBtn');

//adds to database
$addProduct = new Add();
$addProduct->add('sku', 'name', 'option');