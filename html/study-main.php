<?php
include "../php/conn.php";
if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    $pwd = $_SESSION['pwd'];
    $pic = $_SESSION['pic'];
} else {
    // echo "<script>alert('当前未登录，即将进入登陆界面');</script>";
    header("Location:login.php");
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
    <link href="../css/study-image.css" type="text/css" rel="stylesheet" />
    <link href="../css/study.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-main.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/标记.png" sizes="32*32">
    <script src="../js/background.js"></script>
    <style>
        /* 在这里添加CSS样式 */
        #real-time-clock {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            color: #4caf50; 
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
            margin: 20px;
            
        }
        #right {
            width: 100%; 
            height: 100%; 
            align-items: center; /* 垂直居中 */
            justify-content: center; /* 水平居中 */
        }

        #real-time-clock {
            font-size: 8rem; /* 调整为更大的字体 */
            width: 70%; /* 设置为占据`#right`的70% */
            text-align: center; /* 文字居中显示 */
            padding: 20px 0; /* 增加一些内边距 */
            box-sizing: border-box; /* 防止内边距影响到宽度计算 */
            /* 其他样式保持不变 */
        }
        /* 全局设置 */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7; /* 设置页面背景颜色 */
            text-align: center; /* 保证元素居中对齐 */
        }

        /* 计时器显示 */
        #timeshow {
            font-size: 3em; /* 大号字体显示剩余时间 */
            color: #333; /* 时间颜色 */
            margin-bottom: 20px; /* 添加一些间距 */
        }

        /* 按钮通用样式 */
        .btn {
            font-size: 1em;
            padding: 10px 20px; /* 按钮内边距 */
            border: none; /* 移除边框 */
            cursor: pointer; /* 鼠标悬停效果 */
            transition: background-color 0.3s ease; /* 平滑背景颜色过渡 */
        }

        /* 开始和休息按钮样式 */
        .btn-light {
            background-color: #4caf50; /* 按钮背景颜色 */
            color: #fff; /* 文字颜色 */
        }

        /* 开始和休息按钮：鼠标悬停状态 */
        .btn-light:hover {
            background-color: #388e3c; /* 暗色背景 */
        }

        /* 取消按钮样式 */
        .btn-light[onclick="end()"] {
            background-color: #f44336; /* 红色背景，用于取消操作 */
        }

        .btn-light[onclick="end()"]:hover {
            background-color: #d32f2f; /* 鼠标悬停时的暗红色 */
        }

        /* 输入框样式 */
        input[type="text"] {
            font-size: 1em;
            padding: 5px;
            border-radius: 3px; /* 圆角边框 */
            border: 1px solid #cccccc; /* 边框颜色 */
            margin: 0 5px; /* 与其他元素间距 */
        }

        /* 进度条容器 */
        .progress {
            background-color: #e0e0e0; /* 进度条背景 */
            border-radius: 20px; /* 圆角 */
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1); /* 内部阴影 */
            width: 80%; /* 进度条宽度 */
            margin: 20px auto; /* 顶部和底部的间距设置为20px，左右自动居中 */
            height: 30px; /* 进度条高度 */
        }

        /* 进度条 */
        .progress-bar {
            background-color: #2196F3; /* 亮蓝色 */
            border-radius: 20px; /* 圆角相匹配 */
            height: 100%; /* 进度条满高 */
        }
        /* 开始时候的时间显示颜色 */
        .timeshow-start {
            color: #4caf50; /* 例如绿色 */
        }

        /* 结束时候的时间显示颜色 */
        .timeshow-end {
            color: #f44336; /* 例如红色 */
        }
    </style>
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
            <a href="#"  onclick="alert('查找失败')">
                <i>🔍</i>
            </a>
        </div>


        <img id="leaf" src="../images/gif.png" />
        <!-- 最上面那部分 -->
        <div id="head">
            <!-- 头部背景图片 -->
            <div id="head-background">
                <img src="images/<?php echo $pic;?>" onerror="this.style.display='none'"/>
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
                        <li><a href="study-main.php">学习记录</a></li>
                        <li><a href="study-time.php">番茄钟</a></li>
                        <li><a href="study-goal.php">学习进度</a></li>
                    </ul>
                </div>
            </div>

        <!-- 中间右边 -->   
            <div id="right">
                <div id="index">
                    学习空间&nbsp;>&nbsp;学习记录<a name="shang"></a><a name="xia"></a>
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


<script>
    function updateClock() {
        const now = new Date(); // 获取当前的日期和时间
        let hours = now.getHours(); // 获取小时
        let minutes = now.getMinutes(); // 获取分钟

        // 为了让时间始终保持两位数格式
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;

        const timeString = hours + ':' + minutes;

        document.getElementById('real-time-clock').textContent = timeString;

        setTimeout(updateClock, 1000); // 每秒更新时间
    }

    document.addEventListener('DOMContentLoaded', updateClock); // 当页面加载完成时启动时钟
    



var countdownInterval;
var isPomodoro = true;
function start() {
    clearInterval(countdownInterval); // 清除任何现有的计时器
    
    var minutes = isPomodoro ? parseInt(document.getElementById('pomodoro_minutes').value) : parseInt(document.getElementById('rest_minutes').value);
    var seconds = minutes * 60;
    
    countdownInterval = setInterval(function () {
        seconds--; // 每次调用减少一秒
        var remainingMinutes = parseInt(seconds / 60);
        var remainingSeconds = seconds % 60;
        
        // 格式化剩余时间字符串
        remainingSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
        document.getElementById('timeshow').textContent = remainingMinutes + ":" + remainingSeconds;
        
        // 更新进度条
        var progress = ((minutes * 60 - seconds) / (minutes * 60)) * 100;
        document.getElementById('pb').style.width = progress + '%';
        
        if(seconds <= 0){
            clearInterval(countdownInterval);
            if(isPomodoro){
                isPomodoro = false; // 切换到休息状态
                start(); // 自动开始休息时间
            } else {
                isPomodoro = true; // 切换到工作状态
            }
        }
    }, 1000);
}

function rest() {
    isPomodoro = false; // 设置状态为休息
    start(); // 开始休息倒计时
}

function end() {
    clearInterval(countdownInterval); // 停止倒计时
    isPomodoro = true; // 重置为番茄钟状态
    document.getElementById('timeshow').textContent = ""; // 清除时间显示
    document.getElementById('pb').style.width = '0%'; // 重置进度条
}

document.getElementById('pomodoro_minutes').value = '25'; // 设置默认工作时间
document.getElementById('rest_minutes').value = '5'; // 设置默认休息时间
</script>