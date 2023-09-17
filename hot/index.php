<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "../login/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>实时热点</title>
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            setInterval(showmsg, 60000);

            function showmsg() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                document.getElementById("main").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","show.php",true);
            xmlhttp.send();
            }
        </script><!--showmsg-->
        <script>
            function stset() {
                $("#user").val("<?= htmlspecialchars($user["name"]) ?>");
            }
        </script><!--用户名设定-->
        <script>
            var iflogin = 0;
            function islogin() {
                <?php if (isset($user)): ?>
                    iflogin = 1;
                <?php else: ?>
                    iflogin = 0;
                <?php endif; ?>
                if (iflogin == 1) {
                    document.getElementById("tmsg").disabled=false;
                } else if(iflogin == 0) {
                    document.getElementById("tmsg").disabled=true;
                    $("#tmsg").attr("placeholder","请先登录");
                }
            }
        </script><!--登录判定-->
        <script>
            function onload() {
                showmsg();
                islogin();
                stset();
            }
        </script><!--onload-->
        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css" />
    </head>
    <body onload="onload()">
        <header role="banner">
            <nav>
                <ul>
                <!--<li><a href="video.html" title="电影之类的">视频</a></li>-->
                <!--<li><a href="webwxgetmsgimg.gif">雨后</a></li>-->
                <a href="/">主页</a>
                <a href="/typecho">typecho</a>
                <a href="/login">登录/注册</a>
                <a href="/xiyuchat">xiyuchat</a>
                </ul>
            </nav>
        </header>


        <div id="main"></div><!--消息显示区-->


<?php
    $group = "";
    if(isset($user)){
        $groupre = $user;
        $groupre = array_flip($groupre);//反转
        $group = array_search("usergroup",$groupre);
    }

?>

        <!--消息发送-->
        <?php if ($group == "admin"): ?>
        <form name="send" method="post" action="send.php" onsubmit="stset()">
            <input type="text" name="tmsg" id="tmsg" required placeholder="发送消息…">
            <button type="submit" id="sendbtn">发送</button>
            <input type="text" name="user" id="user" value="" style="display: none;">
        </form>
        <br>
        <?php else: ?>
            <p style="color:gray">无发送权限/未登录</p>
        <?php endif; ?>

        <!--<button type="button" onclick="showmsg()">手动刷新</button>-->


        <?php if (isset($user)): ?>
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        <p><a href="/login/logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="/login/login.php">Log in</a> or <a href="/login/signup.html">sign up</a></p>
        <?php endif; ?>
    </body>
</html>