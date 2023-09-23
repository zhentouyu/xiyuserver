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
                        <a href="user.php">用户管理（未完工）</a>
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
		<br>
		你的IP <?php echo $_SERVER['REMOTE_ADDR']; ?>
        <br>
        答案集合:<a href="https://zhentouyu.pages.dev" target="_blank">https://zhentouyu.pages.dev</a>
        <br>
        答案集合(备用):<a href="https://zhentouyu.gitee.io" target="_blank">https://zhentouyu.gitee.io</a>
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
        
        <?php if ($group == "admin"): ?>
            <p><small>这里还缺了一些东西呃<br>
                <ul>
                    <li>登录界面与主界面合并 <span style="font-size: 10px">改header</span></li>
                    <li>在xiyuchat跳转登录完成后回xiyuchat <span style="font-size: 10px">变量</span></li>
                    <li>留言 (等着吧不知道什么时候做) <span style="font-size: 10px">wxpusher</span></li>
                    <li>一堆间距还没调 主要在导航栏部分</li>
                    <li>权限设定 <span style="font-size: 10px">writer和admin在hot部分的还有ban(2)在xiyuchat部分的</span><!--<br><span style="font-size: 10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ban_all:禁止读,ban_w:禁止写</span>--></li>
                    <li>用隐含的 iframe 不刷新页面提交表单</li>
                    <li>admin权限增加删除项</li>
                    <li>长轮询要不xiyuchat没法复制总是刷新</li>
                </ul>
            </small></p>
        <?php endif; ?>

    </footer>

</div>
</body>
</html>                                    
<!--home-->
