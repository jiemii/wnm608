<?php

include "../lib/php/functions.php";

$filename = "../data/users.json";
$users = file_get_json($filename);


$empty_user = (object)[
    "name" => "",
    "type" => "",
    "email" => "",
    "classes" => []
];

//print_p([$_GET, $_POST]);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "update":
            $users[$_GET['id']]->name = $_POST['user-name'];
            $users[$_GET['id']]->type = $_POST['user-type'];
            $users[$_GET['id']]->email = $_POST['user-email'];
            $users[$_GET['id']]->classes = explode(", ", $_POST['user-classes']);

            file_put_contents($filename, json_encode($users));

            header("Location: {$_SERVER['PHP_SELF']}?id={$_GET['id']}");
            break;
        case "create":
            $empty_user->name = $_POST['user-name'];
            $empty_user->type = $_POST['user-type'];
            $empty_user->email = $_POST['user-email'];
            $empty_user->classes = explode(", ", $_POST['user-classes']);

            $id = count($users);
            $users[] = $empty_user;

            file_put_contents($filename, json_encode($users));

            header("Location: {$_SERVER['PHP_SELF']}?id=$id");
            break;
        case "delete";
            array_splice($users, $_GET['id'], 1);
            file_put_contents($filename, json_encode($users));
            header("Location: {$_SERVER['PHP_SELF']}");
            break;
    }
}


function showUserPage($user)
{
    $classes = implode(", ", $user->classes);
    $id = $_GET['id'];
    $add_or_edit = $id == "new" ? "Add" : "Edit";
    $create_or_update = $id == "new" ? "create" : "update";


    $display = <<<HTML

    <div>
        <h2>$user->name</h2>
        <div>
            <strong>Type</strong>
            <span>$user->type</span>
        </div>
        <div>
            <strong>Email</strong>
            <span>$user->email</span>
        </div>
        <div>
            <strong>Classes</strong>
            <span>$classes</span>
        </div>
    </div>

    HTML;


    $form = <<<HTML
    <form method="post" action="{$_SERVER['PHP_SELF']}?id=$id&action=$create_or_update">
            <h2>$add_or_edit User</h2>
        <div class="form-control">
        <label class="form-label" for="user-name">Name</label>
        <input class="form-input" name="user-name" id="user-name" type="text" value="$user->name" placeholder="Enter the User Name"> </div>
        <div class="form-control">
        <label class="form-label" for="user-type">Type</label>
        <input class="form-input" name="user-type" id="user-type" type="text" value="$user->type" placeholder="Enter the User Type"> </div>
        <div class="form-control">
        <label class="form-label" for="user-email">Email</label>
        <input class="form-input" name="user-email" id="user-email" type="text" value="$user->email" placeholder="Enter the User Email">
        </div>
        <div class="form-control">
        <label class="form-label" for="user-classes">Classes</label>
        <input class="form-input" name="user-classes" id="user-classes" type="text" value="$classes" placeholder="Enter the User Classes, comma separated">
        </div>
        <div class="form-control">
        <input class="form-button" type="submit" value="Save Changes">
        </div>
        </form>
    HTML;


    $output = $id == "new" ? $form :
        "<div class='grid gap'>
            <div class='col-xs-12 col-md-7'>$display</div>
            <div class='col-xs-12 col-md-5'>$form</div>
        </div>
        ";

    $delete = $id == "new" ? "" : "<a href='{$_SERVER['PHP_SELF']}?id=$id&action=delete'>Delete</a>";

    echo <<<HTML

    <nav class="display-flex">
        <div class="flex-stretch"><a href="{$_SERVER['PHP_SELF']}">Back</a></div>
        <div class="flex-none"></a>$delete</div>
    </nav>
    $output
    HTML;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users Admin Page</title>
    <?php include "../parts/meta.php"; ?>
</head>

<body>
    <header class="navbar">
        <div class="container display-flex">
            <div class="flex-none">
                <h1>User Admin</h1>
            </div>
            <div class="flex-stretch"></div>
            <nav class="nav nav-flex flex-none">
                <ul>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>">User List</a></li>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add new user</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="card soft">
            <?php
            if (isset($_GET['id'])) {
                showUserPage($_GET['id'] == "new" ? $empty_user : $users[$_GET['id']]);
            } else {
            ?>
                <h2>User List</h2>
                <nav class="nav">
                    <ul>
                        <?php
                        for ($i = 0; $i < count($users); $i++) {
                            echo "<li>
                        <a href='admin/users.php?id=$i'>{$users[$i]->name}</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </nav>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>