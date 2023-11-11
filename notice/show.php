<?php
/*
$conn = require __DIR__."/../login/database.php";

echo "<div id=\"noticemain\" style=\"max-height:500px;width:300px;overflow:auto;border:1px solid grey;border-radius:5px;\">";
echo "<center>公告<br>";
$sql = "SELECT * FROM notice ORDER BY `notice`.`id` DESC";
$result = mysqli_query($conn, $sql);
foreach (mysqli_fetch_all($result) as $key => $value) {
    foreach ($value as $key2 => $value2) {
        if ($key2 == "1") {
            $noticetime = $value2;
            echo "<small>".$noticetime."</small>";
            echo "<br>";
        }
        if ($key2 == "2") {
            $noticemsg = $value2;
            echo "<small style=\"font-size:14px\">".$noticemsg."</small>";
            echo "<br><hr style=\"border: 1px dashed #ddd;\">";
        }
    }
}
echo "</center>";
echo "</div>";
//
mysqli_close($conn);
*/
//由于用数据库获取公告不是很稳定故弃用

echo <<< EOF
<div id="noticemain" style="max-height:500px;width:300px;overflow:auto;border:1px solid grey;border-radius:5px;">
<center>公告
<br>

<small>2023-11-09 23:01:11</small>
<br>
<small style="font-size:14px">部分功能好像还没有完工呢<br>这个网站用v4访问突然变得特别慢 我们正在寻找原因 可能是腾讯云的问题(?</small>
<br>
<hr style="border: 1px dashed #ddd;">

</center>
</div>
EOF;

?>