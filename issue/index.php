<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>留言</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>

            var re = /:/;
            reipv6 = re.test("<?php echo $_SERVER['REMOTE_ADDR']; ?>");
            if (reipv6 == false) {
                var ip = "<?php require "../ip.php"; ?>";
            }
            if (reipv6 == true) {
                var ip = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
            }

            function postsend() {
                var url = 'https://wxpusher.zjiecode.com/api/send/message';
                var text = $("#text").val();
                if ($("#name").val() == "" || $("#name").val() == null)
                {
                    var name = "匿名";
                }
                else{
                    var name = $("#name").val();
                }
                var data = {
                    "appToken":"AT_55nRtejsJvKRI6YDyt9dXA47aI9fWNz4",
                    "content":text+"\n"+name+"\n"+ip,
                    "summary":"新的留言",
                    "contentType":1,
                    "uids":[
                        "UID_mZypACjhTA8s1kXIpEKxzZ24Au3Z"
                    ],
                    "url":"https://xiyu.943689.xyz"
                }
                var jsonData = JSON.stringify(data);
                $.ajax({
                    url:url,
                    type: "POST",
                    data:jsonData,
                    contentType: "application/json;charset=utf-8",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        str_pretty2 = JSON.stringify(data, null, 4)
                        alert(str_pretty2);
                    },
                    error:function(err){
                        console.log(err);
                    }
                });
            }
        </script>
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
                                alert("留言写入数据库成功");
                            }
                    });
                });
            });
        </script>
    </head>
    <body>
        <h1>留言</h1>


        <form id="send">
            <label for="text">留言内容</label>
            <input type="text" id="text" name="text" required>
            <br>
            <label for="name">昵称(非必填)</label>
            <input type="text" id="name" name="name">
            <br>
            <button type="submit" id="sendbtn" onclick="postsend()">留言</button>
        </form>



        <br>
        <small>在这里留言 细鱼就能看到啦 只有细鱼能看到 说什么都可以的</small>
        <br>
        <small>有急事还是要及时联系细鱼哦<br>有添加什么功能想法之类的可以在这里说一说 如果你会代码的也可以来找我合作啦</small>
        <br>
        <small>有精力的可以去<a href="https://github.com/zhentouyu/xiyuserver/pulls" target="_blank" title="也许要梯子 国内访问过于不稳定">交个PR</a> 虽然我也看不明白那个怎么用 没人交过所以我也不会搞（</small>
        <br>
        <small>你的ip
        <?php
            if (preg_match("/:/",$_SERVER['REMOTE_ADDR']) === 1) {
                $ip = $_SERVER['REMOTE_ADDR'];
                echo $ip;
            }elseif (preg_match("/:/",$_SERVER['REMOTE_ADDR']) === 0) {
                require "../ip.php";
                $ip = $contents;
            }//正则表达匹配ip是v4/v6 有:表示v6无需转v4 else没有需要转v4获取

        ?></small>
    </body>
</html>