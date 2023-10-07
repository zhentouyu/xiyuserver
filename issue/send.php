<?php
$name = $_POST["name"];
$text = $_POST["text"];

if (preg_match("/:/",$_SERVER['REMOTE_ADDR']) === 1) {
    $ip = $_SERVER['REMOTE_ADDR'];
    echo $ip;
}elseif (preg_match("/:/",$_SERVER['REMOTE_ADDR']) === 0) {
    require "../ip.php";
    $ip = $contents;
}//正则表达匹配ip是v4/v6 有:表示v6无需转v4 else没有需要转v4获取


if (empty($name)) {
    $name = "匿名";
}

echo $name," ",$text;
// 创建连接
$conn = require "../login/database.php";
 
$sql = "INSERT INTO issue (`name`,`text`,`ip`) VALUES ('".$name."','".$text."','".$ip."')";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

header("Location: index.php");
exit;
?>