<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>留言</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dropdown.css" />
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
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
                    "content":text+"\n"+name,
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
    </head>
    <body>
        <h1>留言</h1>
        <form>
            <label for="text">留言内容</label>
            <input type="text" id="text" name="text" required>
            <br>
            <label for="name">昵称(非必填)</label>
            <input type="text" id="name" name="name">
        </form>
        <button id="submitbtn" onclick="postsend()">留言</button>
        <br>
        <small>在这里留言 细鱼就能看到啦 只有细鱼能看到 说什么都可以的</small>
        <br>
        <small>有急事还是要及时联系细鱼哦<br>有添加什么功能想法之类的可以在这里说一说 如果你会代码的也可以来找我合作啦</small>
        <br>
        <small>有精力的可以去<a href="https://github.com/zhentouyu/xiyuserver/pulls" target="_blank" title="也许要梯子 国内访问过于不稳定">交个PR</a> 虽然我也看不明白那个怎么用 没人交过所以我也不会搞（</small>
    </body>
</html>