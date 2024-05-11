<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的相册空间</title>
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-image.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link href="../css/album.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/图片.png" sizes="32*32">
    <script src="../js/background.js"></script>
</head>


<body>
    <div id="container">
        <!-- 回到顶部箭头 -->
        <a href="#"><img class="head" src="../images/head.png"></a>
        <!-- 点击更换背景图片的设置 -->
  	    <div id="js">
            <img src="../images/3.jpg" alt="" class="photo1">
            <img src="../images/bak4.png" alt="" class="photo1">
            <img src="../images/bak5.png" alt="" class="photo1">
            <img src="../images/bak2.png" alt="" class="photo1">
        </div>
        
        <!-- 搜索框 -->
        <div class="search">
            <input type="search" placeholder="Search">
            <a href="#" onclick="alert('查找失败')">
                <i>🔍</i>
            </a>
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
                    <li><a href="../index.php">主页</a></li>
                    <li><a href="study-main.php">学习空间</a></li>
                    <li><a href="travel.php">生活空间</a></li>
                    <li><a href="album.php">相册空间</a></li>
                    <li><a href="blog.php">博客空间</a></li>
                    <li><a href="music.php">音乐空间</a></li> 
                    <li><a href="center.php">个人中心</a></li> 
                </ul>
            </div>
        </div>



        <!-- 中间的一块 -->
        <div id="middle">
            <div class="title">
				<h2>美&nbsp;·&nbsp;食</h2>
				<p>Delicious&nbsp;&nbsp;&nbsp;Food</p>
			</div>
            <div id="grid">
                <div id="box" class="box1">
                    <img src="../images/food1.png" width="80%" height="40%"/>
                    <h3>牛肉</h3>
                    <p>
                        烤肋眼牛排，新鲜的辣根炒蘑菇和芦笋，香草酸豆黄油。<br />
                        --腓力
                    </p>
                </div>
                <div id="box" class="box2">
                    <img src="../images/food2.png" width="80%" height="60%"/>
                    <h3>蛋糕甜品</h3>
                    <p>
                        如果你不喜欢黄油,那就用奶酪吧<br />
                        --茱莉亚.蔡尔德
                    </p>
                </div>
                <div id="box"  class="box3">
                    <img src="../images/food3.png" width="80%" height="60%"/>
                    <h3>汤</h3>
                    <p style="position:relative;left:5%;">
                        蔬香弥漫，如杯好茶。汤味醇厚，适口益饮。<br />
                        
                    </p>
                    </p>
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
                        <li id="img1"><img src="../images/trip1.png" width="700" height="400" /></li>
                        <li id="img2"><img src="../images/trip2.png" width="700" height="400" /></li>
                        <li id="img3"><img src="../images/trip3.png" width="700" height="400" /></li>
                        <li id="img4"><img src="../images/trip4.png" width="700" height="400" /></li>
                        <li id="img5"><img src="../images/trip5.png" width="700" height="400" /></li>
                        <li id="img6"><img src="../images/trip6.png" width="700" height="400" /></li>
                        <li id="img7"><img src="../images/trip7.png" width="700" height="400" /></li>
                        <li id="img8"><img src="../images/trip8.png" width="700" height="400" /></li>
                        <li id="img9"><img src="../images/trip9.png" width="700" height="400" /></li>
                        <li id="img10"><img src="../images/trip10.png" width="700" height="400" /></li>
                    </ul>
                    <!--隐藏滚动条-->
                    <div class="smallBox">
    
                        <ul class="smallView">
                            <li><a href="#img1"><img src="../images/trip1.png" /></a></li>
                            <li><a href="#img2"><img src="../images/trip2.png" /></a></li>
                            <li><a href="#img3"><img src="../images/trip3.png" /></a></li>
                            <li><a href="#img4"><img src="../images/trip4.png" /></a></li>
                            <li><a href="#img5"><img src="../images/trip5.png" /></a></li>
                            <li><a href="#img6"><img src="../images/trip6.png" /></a></li>
                            <li><a href="#img7"><img src="../images/trip7.png" /></a></li>
                            <li><a href="#img8"><img src="../images/trip8.png" /></a></li>
                            <li><a href="#img9"><img src="../images/trip9.png" /></a></li>
                            <li><a href="#img10"><img src="../images/trip10.png" /></a></li>
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