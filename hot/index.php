<?php
require "../header.php";
#这里和xc同理 需要放在顶上 下面的登录判定需要用到里面的$user变量
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
            $.ajax({
                    method: 'GET',
                    url: 'show.php',
                    success: function(data) {
                        //console.log(data)
                        document.getElementById("main").innerHTML=data;
                    },
                    error: function(res) {
                    }
                });
            }
        </script><!--showmsg-->
        <script>
            function stset() {
                $("#user").val("<?= htmlspecialchars($user["name"]) ?>");
            }
        </script><!--用户名设定-->
        <!--<script>
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
        </script>--><!--登录判定-->
        <script>
            function onload() {
                showmsg();
                islogin();
                stset();
            }
        </script><!--onload-->
        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
        <style>
            table tr td {
                padding:6px;
            }
            table tr:nth-of-type(3) td {
                padding:0px;
            }
            /*.msgid {
                width: 10px;
            }*/
        </style>
    </head>
    <body onload="onload()">



        <div id="main"></div><!--消息显示区-->
        
        <hr>


        <!--消息发送-->
        <?php if ($group == "admin" or $group = "writer"): ?>
        <form name="send" method="post" action="send.php" onsubmit="stset()">
            <input type="text" name="tmsg" id="tmsg" required placeholder="发送实时热点…" style="width: 70%;">
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
        <script>
            var str = document.getElementById("demo").innerHTML; 
            var txt = str.replace(/\r\n/i,"<br>");
        </script>
    </body>
</html>
<!--hot-->
