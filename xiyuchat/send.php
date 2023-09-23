<?php

$user = $_POST["user"];
$msg = $_POST["tmsg"];
if (empty($user)) {
    echo '<a href="/xiyuchat" style="color: green">回到xiyuchat</a><br>';
    die("无访问权限/未登录");
}
echo $user," ",$msg;
// 创建连接
$conn = require "../login/database.php";
 
$sql = "INSERT INTO msg (`user`,`msg`) VALUES ('".$user."','".$msg."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>