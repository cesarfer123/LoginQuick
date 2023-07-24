<?php
// clases cargadas automaticamente
spl_autoload_register(function($classname){
    include "classes/". $classname . ".class.php";
});

// informacion de la bbdd
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","oop_db");