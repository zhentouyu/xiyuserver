<!DOCTYPE html>
<?php
require "../header.php";
#需要放在顶上 下面的登录判定需要用到里面的$user变量

if ($xcallow == "2") {
    header("Location: nologin-xiyuchat.php");
}//=="2"为无访问权限
?>

<html>
    <head>
        <meta charset="utf8">
        <title>xiyuchat</title>
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <link href="/css/toastr.css" rel="stylesheet"/>
        <script src="/js/toastr.min.js"></script>

        <script>
            function stset() {
                $("#user").val("<?= htmlspecialchars($user["name"]) ?>");
            }
        </script><!--用户名设定-->
        <script>
            var iflogin = 0;
            function islogin() {
                <?php
                if (isset($user) and $xcallow == "1") {//已登录且有权限
                    echo "iflogin = 1;";
                }else{//无权限/未登录
                    echo "iflogin = 0;";
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
                                successtoast();
                                document.getElementById("tmsg").value="";
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
                toastr.success(document.getElementById("tmsg").value, "发送成功");
            }
            function aaa(){
                toastr.success(document.getElementById("refrcheck").value, "发送成功");
            }

        </script><!--toastr-->

        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
    </head>
    <body onload="onload()">
        <div><p><mark>这里还没有完工哦<br>能力实在有限<br>长轮询先算了<br>不好搞对接<br>会搞的跟我联系一下（</mark></p></div>
        <div id="main" style="max-height: 500px;overflow:auto;border:2px solid grey;border-radius:5px;"></div><!--消息显示区-->
        
        <hr>

        <!--消息发送-->
        <form name="send" method="post" action="send.php" onsubmit="stset()" id="send">
            <input type="text" name="tmsg" id="tmsg" required placeholder="发送消息…">
            <button type="submit" id="sendbtn">发送</button>
            <input type="text" name="user" id="user" value="" style="display: none;">
        </form>
        <br>
        <input name="refrcheck" id="refrcheck" type="checkbox" checked><label for="refrcheck">启用刷新</label><br>
        <small>如果需要选择的话要先把自动刷新关掉</small>
        <!--<button type="button" onclick="showmsg()">手动刷新</button>-->

        <?php if (isset($user)): ?>
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        <p><a href="/login/logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="/login/login.php">Log in</a> or <a href="/login/signup.html">sign up</a></p>
        <?php endif; ?>

        <script>
            $("#refrcheck").change(function(){
                if (document.getElementById("refrcheck").checked == false) {
                    toastr.info("已关闭自动刷新")
                }
                if (document.getElementById("refrcheck").checked == true) {
                    toastr.info("已启用自动刷新")
                }

            });

            setInterval(showmsg, 1000);
            function showmsg() {
                if (document.getElementById("refrcheck").checked == true){
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
            }
            showmsg();
        </script><!--showmsg-->
    </body>
</html>
<!--xiyuchat-->