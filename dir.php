<?php
$dir = './k40bak';  //文件夹路径

$handle = opendir($dir);  //打开文件夹

while ($file = readdir($handle)) {  //循环读取所有文件

    if ($file != "." && $file != "..") {  //排除"."和".."两个特殊的文件夹
        echo "<a href=\"$dir/".$file."\" target=\"_blank\">$file</a>"."<br>";  //输出文件名

    }

}

closedir($handle);  //关闭文件夹
?>