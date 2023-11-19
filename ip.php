<?php
$url = "101.200.46.93:85/ip.php";
//$url = "43.134.12.4:85/ip.php";//腾讯云的 不用了
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$contents = curl_exec($ch);
curl_close($ch);
echo $contents;
?>