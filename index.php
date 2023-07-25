<?php

include "init.php";

if(!$answer=User::action()->is_logged_in()){
    header("Location: login.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
     <center>Home Page</center>
     <header>
        <a href="">Home</a>
        <a href="">Shop</a>
        <a href="logout.php">Logout</a>
        <a href="login.php">Login</a>
     </header>
</body>
</html>