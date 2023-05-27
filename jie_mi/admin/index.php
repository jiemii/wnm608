<?php

include "../lib/php/functions.php";

$empty_product = (object)[
    "title" => "",
    "description" => "",
    "price" => "",
    "category" => "",
    "thumbnail" => "",
    "images" => "",
    "quantity" => ""
];

// LOGIC
try {
    $conn = makePDOConn();
    switch ($_GET['action']) {
        case "update":
            $statement = $conn->prepare("UPDATE
        `products`
        SET
        `title`=?,
        `price` =?, 
        `quantity`=?, 
        `category`=?,
        `description`=?,
        `thumbnail`=?, 
        `images`=?,
        `date_modify`=NOW()
        WHERE `id`=?
        ");
            $statement->execute([
                $_POST['product-title'],
                $_POST['product-price'],
                $_POST['product-quantity'],
                $_POST['product-category'],
                $_POST['product-description'],
                $_POST['product-thumbnail'],
                $_POST['product-images'],
                $_GET['id']
            ]);
            header("location: {$_SERVER['PHP_SELF']}?id={$_GET['id']}");
            break;
        case "create":
            $statement = $conn->prepare("INSERT INTO
        `products`
        (
        `title`,
        `price`,
        `quantity`,
        `category`,
        `description`, 
        `thumbnail`, 
        `images`,
        `date_create`, 
        `date_modify`
        )
        VALUES (?,?,?,?,?,?,?, NOW(), NOW())
        ");
            $statement->execute([
                $_POST['product-title'],
                $_POST['product-price'],
                $_POST['product-quantity'],
                $_POST['product-category'],
                $_POST['product-description'],
                $_POST['product-thumbnail'],
                $_POST['product-images']
            ]);
            $id = $conn->lastInsertId();
            header("location: {$_SERVER['PHP_SELF']}?id=$id");
            break;
        case "delete":
            $statement = $conn->prepare("DELETE FROM `products` WHERE id=?");
            $statement->execute([$_GET['id']]);
            header("location: {$_SERVER['PHP_SELF']}");
            break;
    }
} catch (PDOException $e) {
    die($e->getMessage());
}

// TEMPLATES
function productListItem($r, $o)
{
    return $r . <<<HTML
    <div class="card soft">
    <div class="display-flex">
    <div class="flex-none images-thumbs"><img src='/images/store/$o->thumbnail'></div>
    <div class="flex-stretch" style="padding: 1em">$o->title</div>
    <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}?id=$o->id" class="form-button">Edit</a></div>
    </div>
    </div>
HTML;
}

function showProductPage($o)
{
    $id = $_GET['id'];
    $addoredit = $id == "new" ? "Add" : "Edit";
    $createorupdate = $id == "new" ? "create" : "update";
    $images = array_reduce(explode(", ", $o->images), function ($r, $o) {
        return $r . "<img src='/images/store/$o'>";
    });

    $display = <<<HTML
    <div>
    <h2>$o->title</h2>
    <div class="form-control">
    <label class="form-label">Price</label> <span>&dollar; $o->price</span>
    </div>
    <div class="form-control">
    <label class="form-label">Quantity</label>
    <span>$o->quantity</span>
    </div>
    <div class="form-control">
    <label class="form-label">Category</label>
    <span>$o->category</span>
    </div>
    <div class="form-control">
    <label class="form-label">Description</label>
    <span>$o->description</span>
    </div>
    <div class="form-control">
    <label class="form-label">Thumbnail</label>
    <span class="images-thumbs"><img src='/images/store/$o->thumbnail'></span>
    </div>
    <div class="form-control">
    <label class="form-label">Other Images</label>
    <span class="images-thumbs">$images</span>
    </div>
    </div>
HTML;

    $form = <<<HTML
    <form method="post" action="{$_SERVER['PHP_SELF']}?id=$id&action=$createorupdate">
    <h2>$addoredit Product</h2>

    <div class="form-control">
    <label class="form-label" for="user-title">Title</label>
    <input class="form-input" name="user-title" id="user-title" type="text" value="$o->title" placeholder="Enter the Product Title">
    </div>
    <div class="form-control">
    <label class="form-label" for="user-price">Price</label>
    <input class="form-input" name="user-price" id="user-price" type="Number" min="0" max="1000" step="0.01" value="$o->price" placeholder="Enter the Product Price">
    </div>
    <div class="form-control">
    <label class="form-label" for="user-category">Category</label>
    <input class="form-input" name="user-category" id="user-category" type="text" value="$o->category" placeholder="Enter the Product Category">
    </div>
    <div class="form-control">
    <label class="form-label" for="user-description">Description</label>
    <textarea class="form-input" name="user-description" id="user-description" placeholder="Enter the Product Description">$o->description</textarea>
    </div>
    <div class="form-control">
    <label class="form-label" for="user-thumbnail">Thumbnail</label>
    <input class="form-input" name="user-thumbnail" id="user-thumbnail" type="text" value="$o->thumbnail" placeholder="Enter the Product Thumbnail">
    </div>
    <div class="form-control">
    <label class="form-label" for="user-images">Other Images</label>
    <input class="form-input" name="user-images" id="user-images" type="text" value="$o->images" placeholder="Enter the Product Images">
    </div>
    <div class="form-control">
    <input class="form-button" type="submit" value="Save Changes"> </div>
    </form>
HTML;

    echo $display . $form;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Admin Page</title>
    <?php include "../parts/meta.php"; ?>
</head>

<body>
    <header class="navbar">
        <div class="container display-flex">
            <div class="flex-none">
                <h1>Product Admin</h1>
            </div>
            <div class="flex-stretch"></div>
            <nav class="nav nav-flex flex-none">
                <ul>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>">Product List</a></li>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add New Product</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    if (isset($_GET['id'])) {
        showProductPage(
            $_GET['id'] == "new" ?
                $empty_product :
                makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=" . $_GET['id'])[0]
        );
    } else {
    ?>

        <h2>Product List</h2>

        <?php
        $result = makeQuery(makeConn(), "SELECT * FROM `products` ORDER BY `date_create` DESC");

        echo array_reduce($result, 'productListItem');
        ?>

    <?php } ?>
    </div>
</body>

</html>