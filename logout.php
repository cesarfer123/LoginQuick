<?php
include "init.php";

if(isset($_SESSION["USER"])){
    unset($_SESSION["USER"]);
}

header("Location: login.php");
die;