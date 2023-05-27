<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qalamate</title>

    <?php include "parts/the_meta.php"; ?>
    <script src="lib/js/functions.js"></script>
    <script src="js/templates.js"></script>
    <script src="js/product_list.js"></script>

    <link rel="stylesheet" href="https://use.typekit.net/sut4alb.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body class="flush">

    <header class="navbar">
        <div class="container display-flex">
            <div class="flex-none">
                <h1>>Qalamate</h1>

            </div>
            <div class="flex-stretch"></div>

            <nav class="flex-none nav">
                <ul class="container display-flex">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product_list.php">Product</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="product_cart.php">
                            <span>Cart</span>
                            <span class="badge"></span>
                        </a></li>
                </ul>
            </nav>
        </div>
    </header>





    <?php include "parts/navbar.php"; ?>

    <div class="container">
        <div class="card">
            <figure class="figure product-overlay">
                <img src="img/bg.jpg" alt="">
            </figure>

        </div>
    </div>

    <div class="container">
        <h2>Pen Products</h2>
        <?php recommendedCategory("pen"); ?>
        <h2>Tools Products</h2>
        <?php recommendedCategory("tool"); ?>
    </div>
</body>

</html>