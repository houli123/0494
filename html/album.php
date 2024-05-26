<?php
include "../php/conn.php";
if(!isset($uname)){
    header("Location:login.php");
    exit(); // 终止脚本执行
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的相册空间</title>
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link href="../css/album.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/图片.png" sizes="32*32">
    <style>
        body {
            background-image: url("../images/3.jpg");
        }
        * {
            margin: 0;
            padding: 0;
        }
        ul {
            list-style: none;
        }
        a {
            text-decoration: none;
        }
        #contain {
            position: relative;
            width: 700px;
            height: 400px;
            margin: 20px auto;
            overflow: hidden;
            /*溢出隐藏：只显示一张图片*/
        }

        #contain .parent {
            position: absolute;
            width: 3500px;
            /*整个图片层长度：700*5=3500*/
            height: 400px;
        }

        #contain .parent li {
            float: left;
            width: 700px;
            height: 100%;
        }

        #contain .parent li img {
            width: 100%;
            height: 100%;
        }

        #contain .btnLeft,
        #contain .btnRight {
            width: 30px;
            height: 30px;
            background-color: #9E9E9E;
            border-radius: 20%;
            opacity: 80%;
            position: absolute;
            /*包含块为图片显示层contain*/
            top: 0;
            bottom: 0;
            margin: auto;
            font-size: 20px;
            color: #f40;
            text-align: center;
            line-height: 30px;
        }

        #contain .btnLeft {
            left: 10px;
        }

        #contain .btnRight {
            right: 10px;
        }

        #contain .btnLeft:hover,
        #contain .btnRight:hover {
            opacity: 90%;
            cursor: pointer;
        }


        /*蒙层*/

        #contain .modal {
            width: 100%;
            height: 40px;
            background: rgba(0, 0, 0, .3);
            position: absolute;
            left: 0;
            bottom: 0;
            line-height: 40px;
            padding: 0 40px;
            box-sizing: border-box;
        }

        #contain .modal .title {
            float: left;
            color: #fff;
            font-size: 12px;
        }

        #contain .modal .dots {
            float: right;
            position: absolute;
            bottom: 10px;
            right: 20px;
        }

        #contain .modal .dots li {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            float: left;
            /*可以使用行块盒*/
            /*display: inline-block;*/
            margin: 0 5px;
            cursor: pointer;
        }

        .clearfix::after {
            content: "";
            display: block;
            clear: both;
        }

        .on {
            background-color: red;
        }

        .off {
            background-color: gray;
        }
    </style>
</head>


<body>
    <div id="container">
        <!-- 回到顶部箭头 -->
        <a href="#" id="go-top"><img class="head" src="../images/head.png"></a>
        <!-- 点击更换背景图片的设置 -->
  	    <div id="js">
            <img src="../images/3.jpg" alt="" class="photo1">
            <img src="../images/bak4.png" alt="" class="photo1">
            <img src="../images/bak5.png" alt="" class="photo1">
            <img src="../images/bak2.png" alt="" class="photo1">
        </div>
        
        <!-- 搜索框 -->
        <!-- <div class="search">
            <input type="search" placeholder="Search">
            <a href="#" onclick="alert('查找失败')">
                <i>🔍</i>
            </a>
        </div> -->


        <img id="leaf" src="../images/gif.png" />
        <!-- 最上面那部分 -->
        <div id="head">
            <!-- 头部背景图片 -->
            <div id="head-background">
                <img src="../images/<?php echo $pic;?>" onerror="this.style.display='none'"/>
            </div>
            <!-- 导航栏 -->
            <div id="nav">
                <ul>
                    <li><a href="../index.php">主页</a></li>
                    <li><a href="study-main.php">学习空间</a></li>
                    
                    <li><a href="album.php">相册空间</a></li>
                    <li><a href="blog.php">博客空间</a></li>
                     
                    <li><a href="center.php">个人中心</a></li> 
                </ul>
            </div>
        </div>



        <!-- 中间的一块 -->
        <div id="middle">
            

        <!-- 轮播图的实现 -->
            <div id="contain">
                <ul class="parent" style="left: 0;">
                    <?php
                    for ($i = 1; $i <= 5;$i++){
                        echo "<li><img src='../images/forest/$i.png'></li>";
                    }
                    ?>
                    <!-- <li><img src="../images/forest/1.png"></li>
                    <li><img src="../images/forest/1.png"></li>
                    <li><img src="../images/forest/1.png"></li>
                    <li><img src="../images/forest/1.png"></li> -->
                </ul>
        
                <!-- 左按钮 -->
                <div class="btnLeft">&lt;</div>
                <!-- 右按钮 -->
                <div class="btnRight">&gt;</div>
                <!-- 底部层 -->
                <div class="modal">
                    <div class="title">
                        <!-- <h2>轮播图</h2> -->
                    </div>
                    <!-- 圆点 -->
                    <div class="dots">
                        <ul class="clearfix">
                            <li class="on"></li>
                            <li class="off"></li>
                            <li class="off"></li>
                            <li class="off"></li>
                            <li class="off"></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="photos">
                <div class="title2">
                    <div class="line"></div>
                    <h2>星空&nbsp;·&nbsp;相册</h2>
                    <p>Start&nbsp;Photos</p>
                </div>


                <!-- 相册的实现 -->
                <div class="content2">
                    <ul class="bigView">
                        <li id="img1"><img src="../images/star/1.png" width="700" height="400" /></li>
                        <li id="img2"><img src="../images/star/2.png" width="700" height="400" /></li>
                        <li id="img3"><img src="../images/star/3.png" width="700" height="400" /></li>
                        <li id="img4"><img src="../images/star/4.png" width="700" height="400" /></li>
                        <li id="img11"><img src="../images/star/11.png" width="700" height="400" /></li>
                        <li id="img12"><img src="../images/star/12.png" width="700" height="400" /></li>
                        <li id="img7"><img src="../images/star/7.png" width="700" height="400" /></li>
                        <li id="img8"><img src="../images/star/8.png" width="700" height="400" /></li>
                        <li id="img9"><img src="../images/star/9.png" width="700" height="400" /></li>
                        <li id="img10"><img src="../images/star/10.png" width="700" height="400" /></li>
                    </ul>
                    <!--隐藏滚动条-->
                    <div class="smallBox">
    
                        <ul class="smallView">
                            <li><a href="#img1"><img src="../images/star/1.png" /></a></li>
                            <li><a href="#img2"><img src="../images/star/2.png" /></a></li>
                            <li><a href="#img3"><img src="../images/star/3.png" /></a></li>
                            <li><a href="#img4"><img src="../images/star/4.png" /></a></li>
                            <li><a href="#img11"><img src="../images/star/11.png" /></a></li>
                            <li><a href="#img12"><img src="../images/star/12.png" /></a></li>
                            <li><a href="#img7"><img src="../images/star/7.png" /></a></li>
                            <li><a href="#img8"><img src="../images/star/8.png" /></a></li>
                            <li><a href="#img9"><img src="../images/star/9.png" /></a></li>
                            <li><a href="#img10"><img src="../images/star/10.png" /></a></li>
                        </ul>
    
                    </div>
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


<script src="../js/background.js"></script>
<script src="../js/album.js"></script>