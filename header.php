<?php

session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__."/login/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
$group = "";
$username = "";
if(isset($user)){
    $infore = $user;
    foreach ($infore as $key => $value) {
        if ($key == "username") {
            $username = $value;
        }elseif ($key == "usergroup") {
            $group = $value;
        }elseif ($key == "xiyuchat") {
            $xcallow = $value;
        }
    }
}


echo <<< EOF
<header role="banner">
    <nav>
        <ul id="headerul">
        <!--<li><a href="video.html" title="电影之类的">视频</a></li>-->
        <!--<li><a href="webwxgetmsgimg.gif">雨后</a></li>-->
        <a href="/">主页</a>
        <a href="/typecho">typecho</a>
        <a href="/login/login.php">登录</a>
        <a href="/login/signup.php">注册</a>
        <a href="/login/index.php">个人中心</a>
        <a href="/hot">实时热点</a></li>
EOF;

if (isset($user)) {
    echo <<<EOF
    <a href="/xiyuchat">xc</a>
EOF;
}


echo <<<EOF
    <a href="/update.html" target="_blank">更新日志</a>
EOF;


if ($group == "admin") {
    echo <<< EOF
        <div class="dropdown">
            <button class="dropbtn" style="font-size: 16px">管理</button>
            <div class="dropdown-content" style="min-width:80px">
                
                <a href="/phpmyadmin" target="_blank">数据库</a>
            </div>
        </div>
EOF;
}


echo <<< EOF
        </ul> 
    </nav>
</header>
EOF;
?>