<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" href="/css/style.css">-->
    <link rel="stylesheet" href="/css/water.css">
</head>
<body>
    <header role="banner">
        <nav>
            <ul style="padding: 0">
		    <!--<li><a href="video.html" title="电影之类的">视频</a></li>-->
		    <!--<li><a href="webwxgetmsgimg.gif">雨后</a></li>-->
            <a href="/">主页</a>
		    <a href="/typecho">typecho</a>
		    <a href="/login">登录/注册</a>
            <a href="/hot">实时热点</a>
            <?php if (isset($user)): ?>
		    <a href="/xiyuchat">xiyuchat</a>
            <?php endif; ?>
            </ul>
        </nav>
    </header>
    <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    