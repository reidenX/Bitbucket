<?php
    use Controllers\Database\View;
    require 'controllers/accessDatabase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/indexAjax.js" defer></script>
</head>
<body>
    <div class="container flex">
        <Header class="flex spaceBetween align">
            <h1>Product List</h1>
            <div>
                <a href="add-product"><button>ADD</button></a>
                <button type="submit" form="productList" id="delete-product-btn">MASS DELETE</button>
            </div>
        </Header>
        <main>
                <form class="container" action="controllers/productremove.php" method="POST" id="productList">
                    <?php
                        $viewProducts = new View();
                        $viewProducts->access();
                    ?>
                </form>
        </main>

        <?php
            include ("footer.php");
        ?>
    </div>
    
</body>
</html>