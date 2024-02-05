<!DOCTYPE html>
<html>
<head>
    <title>个人中心 | 细鱼</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/water.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/dropdown.css" />
</head>
<body>
<?php require "../header.php"; ?>
    <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">登出</a></p>

        <p><a href="modify.php">修改密码</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">登录</a> or <a href="signup.html">注册</a></p>
        
    <?php endif; ?>
    
</body>
</html>