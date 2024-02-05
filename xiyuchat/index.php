<!DOCTYPE html>
<?php
require "../header.php";
#需要放在顶上 下面的登录判定需要用到里面的$user变量

if ($xcallow == "2") {
    header("Location: nologin-xiyuchat.php");
}//=="2"为无访问权限 直接跳转（虽然现在不登录也能访问了所以不知道这个东西还有什么用
?>

<html>
    <head>
        <meta charset="utf-8">
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
                    //header("Location: nologin-xiyuchat.php");//这里已经取消了不登录不能访问 目前只读不写
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
                showmsgfirst();
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

        </script><!--toastr-->


        <link rel="stylesheet" href="/css/water.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
    </head>
    <body onload="onload()">
        <div id="scrolldiv" style="max-height: 500px;overflow:auto;border:2px solid grey;border-radius:5px;"></div><!--消息显示区-->

        <hr>

        <!--消息发送-->
        <form name="send" method="post" action="send.php" onsubmit="stset()" id="send">
            <input type="text" name="tmsg" id="tmsg" required placeholder="发送消息…" style="width: 70%;">
            <button type="submit" id="sendbtn">发送</button>
            <input type="text" name="user" id="user" value="" style="display: none;">
        </form>
        <br>
        <input name="refrcheck" id="refrcheck" type="checkbox" checked><label for="refrcheck">启用刷新</label>
        <button id="fresh" type="button" onclick="showmsgfr()" style="height:30px;width:40px;padding:0px"><span style="text-align: center;font-size:10px;display:inline-block;">手动刷新</span></button>
        <br>
        <small>如果需要选择的话要先把自动刷新关掉</small>
        
        <hr>

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

            function showmsgfirst() {
                $.ajax({
                    method: 'GET',
                    url: 'show.php',
                    success: function(data) {
                        //console.log(data)
                        document.getElementById("scrolldiv").innerHTML=data;
                        scroll();
                    },
                    error: function(res) {
                    }
                });
            }//onload时的showmsg(scroll)

            setInterval(showmsg, 1000);
            function showmsg() {
                if (document.getElementById("refrcheck").checked == true){
                $.ajax({
                    method: 'GET',
                    url: 'show.php',
                    success: function(data) {
                        //console.log(data)
                        document.getElementById("scrolldiv").innerHTML=data;
                    },
                    error: function(res) {
                    }
                });
                }
            }//普通的showmsg

            function showmsgfr() {
                $.ajax({
                    method: 'GET',
                    url: 'show.php',
                    success: function(data) {
                        //console.log(data)
                        document.getElementById("scrolldiv").innerHTML=data;
                    },
                    error: function(res) {
                    }
                });
            }//手动showmsg
        </script><!--showmsg-->
        <script>
            function scroll() {
                //let scrolldiv = document.getElementById('scrolldiv');
                document.getElementById('scrolldiv').scrollTop = document.getElementById('scrolldiv').scrollHeight;
                console.log("scroll success");
            }
        </script><!--scroll-->
    </body>
</html>
<!--xiyuchat-->