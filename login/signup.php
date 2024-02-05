<!DOCTYPE html>
<html>
<head>
    <title>注册 | 细鱼</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
    
</head>
<body>
<?php require "../header.php"; ?>
    <h1>注册</h1>
    
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <div>
            <label for="name">昵称</label>
            <input type="text" id="name" name="name">
        </div>
        
        <div>
            <label for="username">用户名（登录用）</label>
            <input type="text" id="username" name="username">
        </div>
        
        <div>
            <label for="password">密码</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation">重复密码</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        
        <button>Sign up</button>
    </form>
    
</body>
</html>









