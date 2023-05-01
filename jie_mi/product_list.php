<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <?php include "parts/meta.php"; ?>
</head>

<body>
    <?php include "parts/navbar.php"; ?>

    <div class="container">
        <h2>Product List</h2>

        <?php
        $result = makeQuery(makeConn(), "
            SELECT *
            FROM `products`
            ORDER BY date_create DESC
            LIMIT 12
        ");

        echo "<div class='productlist grid gap'>$product_list</div>";
        ?>
    </div>

</body>

</html>