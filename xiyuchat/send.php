<?php
require "../header.php";

$user = $_POST["user"];
$msg = $_POST["tmsg"];
$userid = $_POST["userid"];
if (empty($user) or $xcallow == "2") {
    echo '<a href="/xiyuchat" style="color: green">回到xiyuchat</a><br>';
    die("无访问权限/未登录");
}
echo $user," ",$msg;
// 创建连接
$conn = require "../login/database.php";
 
$sql = "INSERT INTO xcmsg (`user`,`userid`,`msg`) VALUES ('".$user."','".$userid."','".$msg."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>