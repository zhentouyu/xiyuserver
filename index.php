<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "./login/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>细鱼</title>
        <link rel="stylesheet" href="css/style.css" media="all" />
        <link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/style-max480.css" />
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
</head>

<body>
<!--整体页面-->
<div class="container">

    <!--页眉-->
    <header role="banner">
        <nav>
            <ul>
		    <!--<li><a href="video.html" title="电影之类的">视频</a></li>-->
		    <!--<li><a href="webwxgetmsgimg.gif">雨后</a></li>-->
            <a href="/">主页</a>
		    <a href="/typecho">typecho</a>
		    <a href="/login">登录/注册</a>
            <a href="/hot">实时热点</a>
            <?php if (isset($user)): ?>
		    <a href="/xiyuchat">xiyuchat</a>
            <?php endif; ?>
            </ul>
        </nav>
    </header>

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
        <p><small>这里还缺了一些东西呃<br>
            <ul>
                <li>登录界面与主界面合并 <span style="font-size: 10px">改header</span></li>
                <li>在xiyuchat跳转登录完成后回xiyuchat <span style="font-size: 10px">变量</span></li>
                <li>留言 (等着吧不知道什么时候做) <span style="font-size: 10px">wxpusher</span></li>
                <li>修改密码 (用户名/昵称更改直接微信/QQ叫我改数据库) <span style="font-size: 10px">update</span></li>
                <li>一堆间距还没调 主要在导航栏部分</li>
                <li>权限设定 <span style="font-size: 10px">writer和admin在hot部分的还有ban(2)在xiyuchat部分的</span><!--<br><span style="font-size: 10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ban_all:禁止读,ban_w:禁止写</span>--></li>
            </ul>
        </small></p>
    </footer>

</div>
</body>
</html>                                    
