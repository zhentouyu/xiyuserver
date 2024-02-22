<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>登录 | 细鱼</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
</head>
<body>
<?php require "../header.php"; ?>
    <h1>登录</h1>
    
    <?php if ($is_invalid): ?>
        <em>登录失败，请重试 Invalid Login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="username">用户名</label>
        <input type="text" name="username" id="username"
               value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
        
        <label for="password">密码</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
    
</body>
</html>








