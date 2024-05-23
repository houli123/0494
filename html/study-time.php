<?php
include "../php/conn.php";
if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    $pwd = $_SESSION['pwd'];
    $pic = $_SESSION['pic'];
} else {
    // echo "<script>alert('当前未登录，即将进入登陆界面');</script>";
    //header("Location:login.php");
    //exit(); // 终止脚本执行
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
    <link href="../css/study-time.css" type="text/css" rel="stylesheet" />
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
                    学习空间&nbsp;>&nbsp;番茄钟计时<a name="shang"></a>
                </div>
                <hr>
                

                <div id="real-time-clock"></div>

                <div align="center">
                        <div align="center" id="timeshow" style="height: 100px"></div>
                        <br>
                        <br>
                        <div class="col pb-3 align-self-center" align="center">
                            <span class="btn btn-light btn-sm" id="start_button" onclick="start()" role="button">开始</span>
                            <span id="start_stopwatch"><input class="rounded rounded-3" style="text-align: center; border: 1px solid #dddddd" size="3" value="25" id="pomodoro_minutes" name="pomodoro_length" onchange="save_checked_value()" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}">
                                分钟</span>&nbsp;&nbsp;
                            <span class="btn btn-light btn-sm" id="rest_button" onclick="rest()" role="button">休息</span>
                            <span id="rest_stopwatch"><input class="rounded rounded-3" style="text-align: center; border: 1px solid #dddddd" size="3" id="rest_minutes" name="rest_length" value="5" onchange="save_checked_value()" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}">
                                分钟</span>&nbsp;&nbsp;
                            <span class="btn btn-light btn-sm" onclick="end()" role="button">取消</span>
                        </div>
                        <div class="row no-gutters" id="time_percent">
                            <div>
                                <div class="progress rounded-pill" style="height: 30px">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" id="pb"></div>
                                </div>
                            </div>
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
<script src="../js/study-time.js"></script>