<?php
require "../header.php";
#这里和xc同理 需要放在顶上 下面的登录判定需要用到里面的$user变量
echo __DIR__ . "/../header.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>发公告</title>
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <link href="/css/toastr.css" rel="stylesheet"/>
        <script src="/js/toastr.min.js"></script>
        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />

    </head>
    <body onload="onload()">

        <!--消息发送-->
        <?php if ($group == "admin"): ?>
        <form id="send" name="send" method="post" action="send.php">
            <textarea placeholder="发公告…" rows="10" style="width:70%;" id="noticesendtext" name="noticesendtext" form="send"></textarea>
            <button type="submit" id="sendbtn">发送</button>
        </form>
        <br>
        <?php else: ?>
            <p style="color:gray">无权限</p>
        <?php endif; ?>


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
                                console.log("success");
                                successtoast();
                                document.getElementById("noticesendtext").value="";
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
                toastr.success(document.getElementById("noticesendtext").value, "发送成功");
            }

        </script><!--toastr-->

        <script>
            function stset() {
                $("#user").val("<?= htmlspecialchars($user["name"]) ?>");
            }
        </script><!--用户名设定-->


        <script>
            function onload() {
                showmsg();
                islogin();
                stset();
                scroll();
            }
        </script><!--onload-->
    </body>
</html>