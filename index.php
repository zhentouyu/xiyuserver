<?php
#php头已经挪到/header.php里啦 还是只在这里做备份哦
#session_start();
#
#if (isset($_SESSION["user_id"])) {
#
#    $mysqli = require "./login/database.php";
#
#    $sql = "SELECT * FROM user
#            WHERE id = {$_SESSION["user_id"]}";
#            
#    $result = $mysqli->query($sql);
#    
#    $user = $result->fetch_assoc();
#}
#
#    $group = "";
#    if(isset($user)){
#        $groupre = $user;
#        $groupre = array_flip($groupre);//反转
#        $group = array_search("usergroup",$groupre);
#    }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>细鱼</title>
        <!--这里不要使用water.css 容易引发排版问题-->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
        <!--<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/style-max480.css" />-->
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
        <!--<style>
            /* 下拉按钮样式 */
            .dropbtn {
                background-color: white;
                color: #069acf;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            /* 容器 <div> - 需要定位下拉内容 */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* 下拉内容 (默认隐藏) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 180px;
                box-shadow: 0px 8px 8px 0px rgba(0,0,0,0.2);
            }

            /* 下拉菜单的链接 */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* 鼠标移上去后修改下拉菜单链接颜色 */
            .dropdown-content a:hover {background-color: #f1f1f1}

            /* 在鼠标移上去后显示下拉菜单 */
            .dropdown:hover .dropdown-content {
                display: block;
            }
        </style>-->

</head>

<body>
<!--整体页面-->
<div class="container" style="padding-left: 20px">

    <?php if(0==1): ?><!--旧的导航栏 现已用总体代替 仅在这里做备份-->
    <!--页眉-->
    <header role="banner">
        <nav>
            <ul>
		    <!--<li><a href="video.html" title="电影之类的">视频</a></li>-->
		    <!--<li><a href="webwxgetmsgimg.gif">雨后</a></li>-->
            <a href="/">主页</a>
		    <a href="/typecho">typecho</a>
		    <a href="/login/login.php">登录</a>
            <a href="/login/signup.html">注册</a>
            <a href="/login/index.php">个人中心</a>
            <a href="/hot">实时热点</a></li>

            <?php if (isset($user)): ?>
                <a href="/xiyuchat">xiyuchat</a>
            <?php endif; ?>


            <a href="update.html" target="_blank">更新日志</a>


            <?php if ($group == "admin"): ?>
                <div class="dropdown">
                    <button class="dropbtn">管理</button>
                    <div class="dropdown-content">
                        <a href="user.php">用户管理（没用不做了）</a>
                        <a href="/phpmyadmin">数据库</a>
                    </div>
                </div>
            <?php endif; ?>


            </ul>
            
        </nav>
    </header>
    <?php endif; ?><!--结束旧-->

    <?php require "./header.php"; ?><!--新的导航栏-->

    <!--主体-->
    <main role="main">
        <article>
            <center>
                <h1>细~鱼~</h1>
                <img src="logo.jpg" width="44" height="44" alt="" />
                <br>
                这里是细鱼的网页
            </center>
        </article>
        <article>
            <center>
                <br><br>
                <a href="/answer/" target="_blank">建议使用的新答案总集合</a>
                <br>
                <div class="dropdown">
                    <button class="dropbtn" style="font-size: 16px">旧的答案集合</button>
                    <div class="dropdown-content" style="width:300px">
                        答案集合:<a href="https://zhentouyu.pages.dev" target="_blank" style="background-color:#069acf">https://zhentouyu.pages.dev</a>
                        <small>↑微信内已经封锁↑ 访问偏慢但整体资料较全</small>
                        <br>
                        答案集合(备用):<a href="https://zhentouyu.gitee.io" target="_blank" style="background-color:#069acf">https://zhentouyu.gitee.io</a>
                        <small>↑微信内可以打开↑ 访问快但部分资料缺失</small>
                    </div>
                </div>
            </center>
        </article>



    </main>
    
    <!--侧栏-->
    <div class="sidebar">
        <aside role="complementary">

        </aside>
    </div>


    <!--页脚-->
    <footer role="contentinfo">
        <p><small>&copy; 2023 Xiyu</small></p>
        <a href="/issue" target="_blank" title="在这里给细鱼留言~">留言</a>
        <br><br>
        <div id="ipinfo"></div><!--你的ip-->

        <div>
            <article>
                <small>
                    <br>
                    <a href="https://xiyu4.943689.xyz">纯ipv4访问</a>
                    <br>
                    <a href="https://ipv6.943689.xyz">纯ipv6访问</a>
                    <br>
                    <a href="https://xiyu.943689.xyz">双栈访问</a>
                    <br>
                    <a href="https://file.943689.xyz">文件储存点</a>
                </small>
            </article>
        </div>

        <p><small>网页底层 <a href="https://github.com/zhentouyu/xiyuserver/" target="_blank">https://github.com/zhentouyu/xiyuserver/</a></small></p>

        <p><small>如果你是第一次来到这里可以<a href="https://xiyu.943689.xyz/typecho/index.php/11.html">看看这里</a></small></p>

        <?php if ($group == "admin"): //管理菜单 ?>
            <p><small>这里还缺了一些东西呃<br>
                <ul>
                    <li style="color:gray">admin权限增加删除项</li>
                    <li style="color:gray">xc长轮询<span style="font-size: 10px">实现难度有点大</span></li>
                </ul>
            </small></p>
        <?php endif; ?>

    </footer>

</div>
<script>
            var re = /:/;
            reipv6 = re.test("<?php echo $_SERVER['REMOTE_ADDR']; ?>");
            if (reipv6 == false) {
                document.getElementById("ipinfo").innerHTML="<div><article><small>你的IP: <span style=\"color: gray\"><?php echo "<br>内网穿透：".$_SERVER['REMOTE_ADDR']; ?></span><?php echo "<br>实际ip："; require "ip.php"; ?></small></article></div>";
            }
            if (reipv6 == true) {
                document.getElementById("ipinfo").innerHTML="<div></article><small>你的IP: <?php echo $_SERVER['REMOTE_ADDR']."(未经过内网穿透)"; ?></small></article></div>";
            }
        </script>
</body>
</html>                                    
<!--home-->
