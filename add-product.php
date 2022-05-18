<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles/addProduct/addProduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/ajax.js" defer></script>
</head>
<body>
<div class="container flex">
    <Header class="flex spaceBetween">
        <h1>Add Product</h1>
        <div class="flex">
            <button type="submit" class="btn-save" form="product_form" name="save" id="save">Save</button>
            <a href="/"><button class="btn-cancel" name="cancel">Cancel</button></a>
        </div>
    </Header>
    
    <main>
        <form action="validation.php" method="POST" class="firstInputsForm flex spaceBetween" id="product_form">
            <div class="flex spaceBetween align">
                <label for="sku">SKU</label>
                <input id="sku" type="text" name="sku" >
            </div>
            <p class="skuError errormsg"></p>
            <div class="flex spaceBetween align">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" >
            </div>
            <p class="nameError errormsg"></p>
            <div class="flex spaceBetween align">
                <label for="price">Price</label>
                <input id="price" type="text" name="price" >
            </div>
            <p class="priceError errormsg"></p>
            
            <select name="productType" id="productType">
                <option value="Type" disabled selected>TypeSwitcher</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
             <div class="switchInputs dvd" id="DVD"></div>
             <p class='optionError'></p>
        </form>
    </main>
    
    <?php
        include ("footer.php");
    ?>
    </div>
</body>
</html>