<?php
//echo "修改密码\n";

$username = $_POST["username"] ?? '';
$password = $_POST["password"] ?? '';
$password_confirmation = $_POST["password_confirmation"] ?? '';
//echo $username,$password;
if (empty($username)) {
    die("Username is required");
}
if (empty($password)) {
    die("Password is required");
}
if (empty($name)) {
    $name = $username;
}
if ($password_confirmation !== $password) {
    die("Password isn't match");
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
echo "\nPassword ".$password_hash." Password\n";
$link = require __DIR__ . "/database.php";
$sql = 'UPDATE `user` SET `password`=\''.$password.'\', `password_hash`=\''.$password_hash.'\' WHERE username=\''.$username.'\'';
                  
$res = mysqli_query($link, $sql);
if ($res) {
    require "logout.php";
    header("Location: modify-success.php");
    exit;
} else {
    if ($link->errno === 1062) {
        die("username already taken");
    } else {
        die($link->error . " " . $link->errno);
    }//不知道有什么用的代码(else部分)
}

?>