<?php
echo "hahass\n";

$name = $_POST["name"] ?? '';
$username = $_POST["username"] ?? '';
$password = $_POST["password"] ?? '';
$password_confirmation = $_POST["password_confirmation"] ?? '';
$time = time();
echo $name,$username,$password;
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

$link = require __DIR__ . "/database.php";
echo "connect to database.php successfully";
$sql = 'INSERT INTO `user` (`name`, `username`, `password`, `password_hash`, `createtime`) VALUES (\''.$name.'\', \''.$username.'\', \''.$password.'\', \''.$password_hash.'\', \''.$time.'\')';
                  
$res = mysqli_query($link, $sql);
if ($res) {
    header("Location: signup-success.php");
    exit;
} else {
    if ($link->errno === 1062) {
        die("username already taken");
    } else {
        die($link->error . " " . $link->errno);
    }
}

?>