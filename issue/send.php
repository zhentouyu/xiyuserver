<?php
$name = $_POST["name"];
$text = $_POST["text"];
if (empty($name)) {
    $name = "匿名";
}
echo $name," ",$text;
// 创建连接
$conn = require "../login/database.php";
 
$sql = "INSERT INTO issue (`name`,`text`) VALUES ('".$name."','".$text."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>