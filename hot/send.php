<?php
$user = $_POST["user"];
$msg = $_POST["tmsg"];
if (empty($user)) {
    echo '<a href="/hot" style="color: green">回到实时热点</a><br>';
    die("无访问权限/未登录");
}
echo $user," ",$msg;
// 创建连接
$conn = require "database.php";
$msg = preg_replace("/\/r\/n/","<br>",$msg);
$sql = "INSERT INTO hot (`user`,`msg`) VALUES ('".$user."','".$msg."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>