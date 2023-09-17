<?php
$servername = "localhost";
$username = "root";
$password = "zoutaoyu319";
$dbname = "xiyuchat";
$user = $_POST["user"];
$msg = $_POST["tmsg"];
echo $user," ",$msg;
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO msg (`user`,`msg`) VALUES ('".$user."','".$msg."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>