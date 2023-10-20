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
        <link href="/css/toastr.css" rel="stylesheet"/>
        <script src="/js/toastr.min.js"></script>

        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
        <style>
            table tr td {
                padding:6px;
            }
            /*table tr:nth-of-type(3) td {
                padding:0px;
            }
            .msgid {
                width: 10px;
            }*/
        </style>

    </head>
    <body onload="onload()">



        <div id="showarea"></div><!--<div id="main" style="max-height: 500px;overflow:auto;border:2px solid grey;border-radius:5px;"></div>--><!--消息显示区-->
        
        <hr>


        <!--消息发送-->
        <?php if ($group == "admin" or $group = "writer"): ?>
        <form id="send" name="send" method="post" action="send.php" onsubmit="stset()">
            <!--<input type="text" name="tmsg" id="tmsg" required placeholder="发送实时热点…" style="width: 70%;">--><!--这里已经换成textarea 可以进行更简单的换行操作和更优化的显示-->
            <textarea placeholder="发送实时热点…" rows="10" style="width:70%;" id="hotsendtext" name="hotsendtext" form="send"></textarea>
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
                                successtoast();
                                document.getElementById("hotsendtext").value="";
                            }
                    });
                });
            });
        </script><!--ajax提交表单-->

        <script>
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "0",
            "hideDuration": "0",
            "timeOut": "1000",
            "extendedTimeOut": "0",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
            function successtoast() {
                toastr.success(document.getElementById("hotsendtext").value, "发送成功");
            }

        </script><!--toastr-->

        <!--<script>
            function scroll() {
                //let scrolldiv = document.getElementById('scrolldiv');
                document.getElementById('main').scrollTop = document.getElementById('main').scrollHeight;
                console.log("scroll success");
            }
        </script>--><!--scroll(这里因为show.php里加了倒序所以可以不scroll了)-->

        <script>
            setInterval(showmsg, 60000);

            function showmsg() {
            $.ajax({
                    method: 'GET',
                    url: 'show.php',
                    success: function(data) {
                        //console.log(data)
                        document.getElementById("showarea").innerHTML=data;
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

        <script>
            var iflogin = 0;
            function islogin() {
                <?php if (isset($user)): ?>
                    iflogin = 1;
                <?php else: ?>
                    iflogin = 0;
                <?php endif; ?>
                if (iflogin == 1) {
                    document.getElementById("hotsendtext").disabled=false;
                } else if(iflogin == 0) {
                    document.getElementById("hotsendtext").disabled=true;
                    $("#hotsendtext").attr("placeholder","请先登录");
                }
            }
        </script><!--登录判定-->

        <script>
            function onload() {
                showmsgfirst();
                islogin();
                stset();
                scroll();
            }
        </script><!--onload-->
    </body>
</html>
<!--hot-->
