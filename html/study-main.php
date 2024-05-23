<?php
include "../php/conn.php";
if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    $pwd = $_SESSION['pwd'];
    $pic = $_SESSION['pic'];
} else {
    // echo "<script>alert('当前未登录，即将进入登陆界面');</script>";
    header("Location:study-time.php");
    //exit(); // 终止脚本执行
}

// 定义计数器文件的路径
$counter_file = '../counter.txt';

// 判断文件是否存在
if (!file_exists($counter_file)) {
    // 如果文件不存在，创建文件并将计数器初始为1
    file_put_contents($counter_file, '1');
    $count = 1;
} else {
    // 如果文件存在，读取当前计数，加1后保存
    $count = (int) file_get_contents($counter_file) + 1;
    file_put_contents($counter_file, $count);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的学习空间</title>
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-main.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/标记.png" sizes="32*32">
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
            <a href="#"  onclick="alert('查找失败')">
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
            <!-- 中间左边 -->
            <div id="left">
                
                <!-- 导航栏 -->
                <div id="nav1">
                    <ul>
                        <li><a href="study-main.php">学习打卡</a></li>
                        <li><a href="study-time.php">番茄钟计时</a></li>
                        <li><a href="study-todo.php">ToDoList</a></li>
                    </ul>
                </div>
            </div>

        <!-- 中间右边 -->   
            <div id="right">
                <div id="index">
                    学习空间&nbsp;>&nbsp;学习打卡<a name="shang"></a>
                </div>
                <hr>
                
                <div class="calendar">
                    <div class="title">
                        <h1 class="green" id="calendar-title">Month</h1>
                        <h2 class="green" id="calendar-year">Year</h2>
                        <a href="" id="pre" class="previous round"></a>
                        <a href="" id="next" class="next round"></a>
                    </div>

                    <div class="body">
                        <div class="lightgrey body-list">
                            <!--使用无序列表标签显示星期-->
                            <ul>
                                <li>日</li>
                                <li>一</li>
                                <li>二</li>
                                <li>三</li>
                                <li>四</li>
                                <li>五</li>
                                <li>六</li>
                            </ul>
                        </div>
                        <!--使用无序列表标签显示日期，日期使用JavaScript动态获取，然后使用innerHTML设置<ul>标签之间的HTML-->
                        <div class="darkgrey body-list">
                            <ul id="days">

                            </ul>
                        </div>
                    </div>
                </div>


                <!-- 签到部分 -->
            <div class="sign-content">
                <!-- 签到时间 -->
                <div class="sign-time"><span id="todays">请点击签到</span></div>

                <!-- 签到按钮 -->
                <div class="sign-button">
                    <div class="sign-button-big">
                        <button class="sign-button-small" onclick="sign()" id="signs">签到</button>
                    </div>
                </div>

                <!-- 签到记录 -->
                <div class="sign-logs" style="display: none;" id="signLogs">
                    <span>已签到<span id="signTimes"><?php echo $count ?></span>次
                </div>



                <!-- 签到用户 -->
                <div class="sign-users" style="display: none;" id="signUsers">
                    <span><img src="../images/<?php echo $pic;?>" onerror="this.style.display='none'" style="height:50px;width:50px;position:relative;top:-5px;"></span>
                    <span><?php echo $uname;?></span>
                    <span id="signMin"></span>
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
<script src="../js/study-main.js"></script>
