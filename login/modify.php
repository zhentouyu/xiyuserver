<!DOCTYPE html>
<html>
<head>
    <title>Modify Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />

</head>
<body>
<?php require "../header.php"; ?>
    
    <h1>Modify Password</h1>

    <?php if (isset($user)): ?>
        <!--已登录-->
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        <p>需要改用户名/昵称的叫我改数据库</p>

        <form action="process-modify.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            
            <div>
                <label for="password">New password</label>
                <input type="password" id="password" name="password">
            </div>
            
            <div>
                <label for="password_confirmation">Repeat new password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            
            <button>Modify Password</button>
        </form>
        
    <?php else: ?>
        <!--未登录-->
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    

</body>
</html>








