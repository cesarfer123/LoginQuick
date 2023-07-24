<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
        <input class="input" type="text" name="username" placeholder="Username"><br>
        <input class="input" type="email" name="email" placeholder="Email"><br>
        <input class="input" type="password" name="password" placeholder="Password"><br>
        <select class="input" name="gender" style="max-width: 300px">
            <option>--Select Gender--</option>
            <option value="">Female</option>
            <option value="">Male</option>
        </select><br><br>
        <input class="btn" type="submit" name="Signup">
        <br style="clear: both;">
    </form>
</body>
</html>