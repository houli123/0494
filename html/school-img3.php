<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>校园生活瞬间</title>
    <style>
        @import url(../css/index.css);
        @import url(../css/study-image.css);
        .left1{
            margin:5% 0 5% 5%;
        }
    </style>
</head>


<body>
    <!-- 回到顶部箭头 -->
    <a href="#"><img class="head" src="../images/head.png"></a>
    <!-- bgm设置 -->
    <audio class="audio" controls src="../audio/纯音乐-忧伤还是快乐.mp3" autoplay="autoplay" >111</audio>
    
    <div id="container">
            <!-- 搜索框 -->
        <div class="search">
            <input list="search" size="30" placeholder="查看功能位置"/>
            <datalist id="search">
                <option value="学习记录"></option>
                <option value="学习记录-好言好句"></option>
                <option value="学习记录-学习笔记"></option>
                <option value="学习记录-学习视频"></option>
                <option value="校园生活"></option>
                <option value="校园生活-生活瞬间"></option>
                <option value="校园生活-生活视频"></option>
                <option value="校园生活-校园工具箱"></option>
                <option value="旅游记录"></option>
                <option value="旅游记录-旅游攻略"></option>
                <option value="旅游记录-旅游图片"></option>
                <option value="旅游记录-旅游视频"></option>
                <option value="访问留言"></option>
            </datalist>
        </div>


        <img id="leaf" src="../images/gif.png" />
        <!-- 最上面那部分 -->
        <div id="head">
            <!-- 头部背景图片 -->
            <div id="head-background">
                <img src="../images/photo.png"/>
            </div>
            <!-- 导航栏 -->
            <div id="nav">
                <ul>
                    <li><a href="../index.php">个人信息</a></li>
                    <li><a href="study-main.php">学习空间</a></li>
                    <li><a href="travel.php">生活空间</a></li>
                    <li><a href="album.php">相册空间</a></li>
                    <li><a href="blog.php">博客空间</a></li>
                    <li><a href="center.php">个人中心</a></li>  <!--表单大集合-->
                </ul>
            </div>
        </div>



        <!-- 中间的一块 -->
        <div id="middle">
            <!-- 中间左边 -->
            <div id="left">
                
                <!-- 导航栏 -->
                <div id="nav1">
                    <ul>
                        <li><a href="school.php">校园生活</a></li>
                        <li><a href="school-img.php">生活瞬间</a></li>
                        <li><a href="school-video.php">生活视频</a></li>
                        <li><a href="school-tool.php">校园工具箱</a></li>
                    </ul>
                </div>
            </div>

        <!-- 中间右边 -->   
            <div id="right">
                <div id="index">
                    校园生活&nbsp;>&nbsp;生活瞬间
                </div>
                <hr>
                <div id="row">
                    <!-- 第一行图片 -->

                    <div class="left1">
                        <input id="file" type="file"/>
                        <br>
                        <input type="text" placeholder="请输入瞬间名称：" size="32%"/>
                        <br>
                        <input type="button" value="上传瞬间"/>
                        </div>
                </div> 
                <!-- 下一页按钮 -->
                <div id="next">
                    <a href="school-img2.php" class="previous round">&#8249;</a>
                    <a href="#" class="next round">&#8250;</a>
                </div>
            </div>
        </div>



        <!-- 页脚 -->
        <footer>
            深圳职业技术大学——人工智能学院信息楼实验室<br>
地址：广东省深圳市南山区沙河西路4089号 邮编：518055 <br/>电话：0755—2046336

邮编：518055 电话：0755—2046337
<br>更多信息：<a href="http://www.szpt.edu.cn" target="_blank">点击官网</a>
        </footer>
    </div>

    
</body>
</html>