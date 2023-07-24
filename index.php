<?php

include "init.php";


// $array["password"]="654321";
// $array["username"]="maria perez";
// $array["gender"]="feme";
// User::action()->update_by_id($array,2);
$data=User::action()->get_by_id(2);
// $data1=User::action()->get_by_email1('percy@gmail.com');

echo "<pre>";
print_r($data);
// print_r($data1);