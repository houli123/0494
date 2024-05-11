<?php
include "../php/conn.php";

if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
} else {
    echo "<script>alert('当前未登录，即将进入登陆界面');</script>";
    header("Location:login.php");
}

if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    // header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的个人中心</title>
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-image.css" type="text/css" rel="stylesheet" />
    <link href="../css/center.css" type="text/css" rel="stylesheet" />
    <link rel="icon" sizes="16x16" href="../images/icon/用户.png">
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
                    
                    <li><a href="album.php">相册空间</a></li>
                    <li><a href="blog.php">博客空间</a></li>
                     
                    <li><a href="center.php">个人中心</a></li> 
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
                        <li><a href="center.php">更改基本资料</a></li>
                        <li><a href="center2.php">更改个人头像</a></li>
                        <li><a href="center.php">退出登录</a></li>
                       
                    </ul>
                </div>
            </div>

         <!-- 中间右边 -->   
            <div id="right">
                <div id="index">
                    个人中心&nbsp;>&nbsp;更改基本资料
                </div>
                <hr style="opacity: unset;">
                <!-- 以下是正式内容 -->
                <p>
                    &nbsp;&nbsp;<b>基本资料</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class="basic" href="../index.php#info">预览</a>
                </p>
                

            <form>
                <!-- 下面开始表单 -->
                <div id="box" class="box">
                    <span class="input input_span">
                        <label class="input_label input_label1">
                            昵称：&nbsp;&nbsp;
                        </label>
                        <input class="input_input" type="text" placeholder="Jack">
                    </span>
                </div>
                <hr>
                
                <!-- 性别 -->
                <div class="box">
                    <span class="input">
                        <label class="input_label input_label2">
                            性别：&nbsp;
                        </label>
                        男<input type="radio" name="group1" checked>
                        女<input type="radio" name="group1" >
                    </span>
                </div>
                <hr>

                <!-- 生日 -->
                <div class="box">
                    <span class="input">
                        <label class="input_label input_label2">
                            生日：&nbsp;
                        </label>
                        <input type="date" value="2003-06-18">
                    </span>
                </div>
                <hr>

                <!-- 星座 -->
                <div class="box">
                    <span class="input">
                        <label class="input_label input_label2">
                            星座：&nbsp;
                        </label>
                        双子座
                    </span>
                </div>
                <hr>

                <!-- 现居地 -->
                <div id="box" class="box" style="overflow-x:hidden">
                    <span class="input" style="width: 500px">
                        <label class="input_label input_label2" style="float: left;top:0.8em;">
                            现居地：
                        </label>
                        <select id="provident" style="width: 85px;height: 55px; float:left"><option value="0">选择省</option><option value="34">安徽</option><option value="82">澳门</option><option value="11">北京</option></select>
                        <input class="input_input input_input2" type="text" placeholder="详细地址" style="float: left;">
                    </span>
                </div>
                <hr>
                
                <div class="box">
                    
                        <input type="submit" value="保存" onclick="alert('保存失败')"></input>
                    
                </div> 
            </form>

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