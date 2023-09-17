<?php
$user = $_POST["user"];
$msg = $_POST["tmsg"];
echo $user," ",$msg;
// 创建连接
$conn = require "database.php";
 
$sql = "INSERT INTO hot_msg (`user`,`msg`) VALUES ('".$user."','".$msg."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>