<!DOCTYPE html>
<?php
require "../header.php";
#需要放在顶上 下面的登录判定需要用到里面的$user变量
//临时↓
if ($username !== "ss") {
    header("Location: nologin-xiyuchat.php");
}
?>

<html>
    <head>
        <meta charset="utf8">
        <title>xiyuchat</title>
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            setInterval(showmsg, 1000);

            function showmsg() {
                $.ajax({
                    method: 'GET',
                    url: 'show.php',
                    //timeout: 5000,
                    success: function(data) {
                        console.log(data)
                        document.getElementById("main").innerHTML=data;
                    },
                    error: function(res) {
                    }
                });
            }
            showmsg();

        </script><!--showmsg-->
        <script>
            function stset() {
                $("#user").val("<?= htmlspecialchars($user["name"]) ?>");
            }
        </script><!--用户名设定-->
        <script>
            var iflogin = 0;
            function islogin() {
                <?php
                if (isset($user)) {
                    echo "iflogin = 1";
                }else{
                    echo "iflogin = 0";
                    header("Location: nologin-xiyuchat.php");
                }
                ?>
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
        <script>
            $(document).ready(function() {
                $('#send').submit(function(event) {
                    // 阻止表单默认提交行为
                    event.preventDefault();
                        // 通过AJAX提交表单数据
                        $.ajax({
                            type: 'POST',
                            url: 'send.php',
                            data: $('#send').serialize(),
                            success: function(data) {
                                showmsg();
                            }
                    });
                });
            });
        </script>
        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
    </head>
    <body onload="onload()">
        <div><p><mark>这里还没有完工哦<br>能力实在有限<br>长轮询先算了<br>不好搞对接<br>会搞的跟我联系一下（</mark></p></div>
        <div id="main"></div><!--消息显示区-->

        <!--消息发送-->
        <form name="send" method="post" action="send.php" onsubmit="stset()" id="send">
            <input type="text" name="tmsg" id="tmsg" required placeholder="发送消息…">
            <button type="submit" id="sendbtn">发送</button>
            <input type="text" name="user" id="user" value="" style="display: none;">
        </form>

        <br>
        <!--<button type="button" onclick="showmsg()">手动刷新</button>-->

        <?php if (isset($user)): ?>
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        <p><a href="/login/logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="/login/login.php">Log in</a> or <a href="/login/signup.html">sign up</a></p>
        <?php endif; ?>
    </body>
</html>
<!--xiyuchat-->