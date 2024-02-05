<?php require "../header.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>公告 | 细鱼</title>
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="/css/dropdown.css" />
        <link rel="stylesheet" href="/css/water.css" />
    </head>
<body style="padding-left: 20px">
    <center><h1>公告</h1></center><br>

    <?php

    $conn = require __DIR__."/../login/database.php";

    echo "<div id=\"noticemain\">";
    $sql = "SELECT * FROM notice ORDER BY `notice`.`id` DESC";
    $result = mysqli_query($conn, $sql);
    foreach (mysqli_fetch_all($result) as $key => $value) {
        foreach ($value as $key2 => $value2) {
            if ($key2 == "1") {
                $noticetime = $value2;
                echo $noticetime;
                echo "<br>";
            }
            if ($key2 == "2") {
                $noticemsg = $value2;
                echo "<div style=\"margin-left:2em\">".$noticemsg."</div>";
                echo "<hr style=\"border: 1px dashed #ddd;\">";
            }
        }
    }
    echo "</center>";
    echo "</div>";
    //
    mysqli_close($conn);


    //下面的部分过于原始故弃用
    /*
    echo <<< EOF
    <div id="noticemain" style="max-height:500px;width:300px;overflow:auto;border:1px solid grey;border-radius:5px;">
    <center>公告
    <br>

    <small>2023-11-21 00:01:11</small>
    <br>
    <small style="font-size:14px">部分功能好像还没有完工呢<br>网站v4访问已修复 腾讯云速度过慢</small>
    <br>
    <hr style="border: 1px dashed #ddd;">

    </center>
    </div>
    EOF;
    */
    ?>
</body>



</html>