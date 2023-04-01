<?php

include "../lib/php/functions.php";

$users_array = file_get_json("../data/users.json");


function showUserPage($user) {

    $classes = implode(", ", $user->classes);
    
    // heredoc
    echo <<<HTML
    <nav class="nav nav-crumbs">
        <ul>
            <li><a href="admin/users.php">Back</a></li>
        </ul>
    </nav>
    <div>
        <h2>$user->name</h2>
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
}

?>
<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title>User Admin</title>

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
                    <li><a href="admin/users.php">User List</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
       
        <div class="card soft">
        
            <?php
            
            if(isset($_GET['id'])) {
                showUserPage();
            } else {

            ?>
            <h2>Users List</h2>

            <nav class="nav">
                <ul>
            <?php

            for ($i=0;$i<count($users); $i++){
                echo "<li>
                    <a href='admin/users.php?id=$1'>{$users[$i]->name}</a>
                </li>";
            }

            ?>
                </ul>
            </nav>

            <?php } ?>
        </div>
    </div>

</body>
</html>