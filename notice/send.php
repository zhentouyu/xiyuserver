<?php
echo __DIR__ . "/../header.php";
require __DIR__ . "/../header.php";
if ($group == "admin") {
    $msg = $_POST["noticesendtext"];
    echo $msg;
    $conn = require __DIR__ . "/../login/database.php";
    $sql = "INSERT INTO notice (`msg`) VALUES ('".$msg."')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    exit;
}
else {
    die("无权限");
}
?>