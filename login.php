<?php
    include "init.php";
    if(count($_POST)>0){
        // un post fue creado
        $errors=User::action()->login($_POST);
        if(!is_array($errors)){
            header("Location: index.php");
            die;
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style type="text/css">
        form{
            margin: auto;
            margin-top: 20px;
            width: 100%;
            max-width: 300px;
            border-radius: 5px;
            border: solid thin #ccc;
            box-shadow: 0px 0px 10px #aaa;
            font-family: tahoma;
            padding: 10px;
            position: relative;
        }
        .input{
            position: relative;
            margin: auto;
            width: 100%;
            max-width: 280px;
            border-radius: 5px;
            border: solid thin #ccc;
            padding: 10px;
            margin-top: 5px;
        }
        .btn{
            padding: 10px;
            float: right;
            border: none;
            background-color: #0087ff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
    <form action="" method="post">
        <h2>Login</h2>
            <div style="color: red; font-size:11px;">
                <?php 
                    if(isset($errors) && count($errors)>0){
                        foreach ($errors as $error) {
                            # code...
                            echo $error . "<br>";
                        }
                    }
                ?>
            </div>
        
        <input class="input" type="email" name="email" placeholder="Email" value='<?=isset($_POST["email"]) ? $_POST["email"] : "";?>'><br>
        <input class="input" type="password" name="password" placeholder="Password" value='<?=isset($_POST["password"]) ? $_POST["password"] : "";?>'><br>

        <input class="btn" type="submit" name="Login">
        <br style="clear: both;">
    </form>
</body>
</html>