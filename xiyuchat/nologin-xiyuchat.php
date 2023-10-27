<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>尚未登录</title>
        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
    </head>
    <body>
        <?php require "../header.php"; ?>
            <p>你还没有登录/无xiyuchat访问权限<br><br><a href="/login/login.php">Log in</a> or <a href="/login/signup.html">sign up</a></p>
            <?php
            echo "username:".$username;
            ?>
    </body>
</html>