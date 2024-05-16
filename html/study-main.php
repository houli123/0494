<?php
include "../php/conn.php";
if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    $pwd = $_SESSION['pwd'];
    $pic = $_SESSION['pic'];
} else {
    // echo "<script>alert('当前未登录，即将进入登陆界面');</script>";
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
    <title>我的学习空间</title>
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-image.css" type="text/css" rel="stylesheet" />
    <link href="../css/study.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-main.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/标记.png" sizes="32*32">
    <script src="../js/background.js"></script>
    <style type="text/css">
        * {
            padding: 0%;
            /*设置内边距*/
            margin: 0%;
            /*设置外边距*/
        }

        /*设置整个页面的显示样式*/
        .calendar {
            margin: 45px;
            width: 450px;
            height: 350px;
            background: white;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, .1);
        }

        /*标题的显示样式*/
        .title {
            height: 70px;
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            position: relative;
            text-align: center;
        }

        /*标题中的月份显示样式*/
        #calendar-title {
            font-size: 25px;
            text-transform: uppercase;
            font-family: Arial, Helvetica, sans-serif;
            padding: 14px 0 0 0;
        }

        /*标题中的年份显示样式*/
        #calendar-year {
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: normal;
        }

        /*上个月的超链接显示样式*/
        #pre {
            position: absolute;
            top: 0px;
            left: 0px;
            background: url(image/pre.png) no-repeat 50% 50%;
            /*没规定大小时，图片显示 0X0*/
            width: 60px;
            height: 70px;
        }

        /*下个月的超链接显示样式*/
        #next {
            position: absolute;
            top: 0px;
            right: 0px;
            background: url(image/next.png) no-repeat 50% 50%;
            width: 60px;
            height: 70px;
        }

        .body-list ul {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            width: 100%;
            box-sizing: border-box;

        }

        .body-list ul li {
            list-style: none;
            display: block;
            width: 14.28%;
            float: left;
            /*规定行高，垂直居中*/
            height: 36px;
            line-height: 36px;
            box-sizing: border-box;
            text-align: center;
        }

        /*类选择器：设置所有class属性为green的标签的样式*/
        .green {
            color: #6ac13c;
        }

        /*设置已经过去的日期颜色*/
        .lightgrey {
            color: #a8a8a8;
        }

        /*设置将来的日期颜色*/
        .darkgrey {
            color: #565656;
        }

        /*日期当天用绿色背景绿色文字加以显示*/
        .greenbox {
            border: 1px solid #6ac13c;
            background: #e9f8df;
        }
        .calendar {
            width: fit-content; /* 或者指定一个具体的宽度 */
            margin: 0 auto; /* 水平方向自动计算边距以实现居中 */
        }
        .sign-content {
    width: 94vw;
    height: 40vh;
    margin-left: 3vw;
}

.sign-time {
    width: 98%;
    height: 8vh;
    text-align: center;
    line-height: 10vh;
    font-size: 22px;
    margin-left: 1%;
    color: #4caf50; /* 主题颜色 */
}

.sign-button {
    width: 98%;
    height: 15vh;
    margin-left: 1%;
    font-size: 22px;
    text-align: center;
    line-height: 11vh;
    margin-top: 5%;
}

.sign-button-big {
    width: 28%;
    height: 73%;
    margin: 0 auto;
    border-radius: 50%;
    background-color: #6ac13c; /* 调整为主题颜色 */
    color: white;
    padding: 3%;
}

.sign-button-small {
    width: 100%;
    height: 100%;
    margin: 0 auto;
    border-radius: 50%;
    background-color: #4caf50; /* 调整为主题颜色 */
    color: white;
    border: 0;
    cursor: pointer;
}

.sign-button-small:hover {
    color: #4caf50;
    background-color: white;
}

.sign-logs {
    width: 98%;
    height: 8vh;
    margin-left: 1%;
    text-align: center;
    font-size: 12px;
    line-height: 6vh;
}

.sign-logs > span > a {
    color: #436eee; /* 保持链接颜色，或者也可以调整为主题颜色 */
}

.sign-texts {
    width: 98%;
    height: 4vh;
    margin-left: 1%;
    text-align: center;
    font-size: 16px;
    color: #dd514c; /* 标题颜色可以调整 */
    border-bottom: 2px solid #dd514c; /* 加强标识，或者改为绿色 */
    line-height: 4vh;
}

.sign-users {
    width: 98%;
    height: 7vh;
    margin-left: 1%;
    padding-top: 2%;
    border-bottom: 1px solid #dddddd;
}

.sign-users > span:nth-child(1) {
    width: 12vw;
    float: left;
    margin-left: 5%;
}

.sign-users > span:nth-child(2) {
    float: left;
    font-size: 16px;
    line-height: 6vh;
    margin-left: 3%;
    color: #333; /* 用户名颜色可以调整为深色 */
}

.sign-users > span:nth-child(3) {
    float: right;
    font-size: 15px;
    line-height: 6vh;
    color: #555; /* 时间颜色可以调整为深色 */
}

.sign-users > span > img {
    width: 100%;
    height: 100%;
    border-radius: 5%;
}

.sign-load {
    width: 98%;
    height: 4vh;
    margin-left: 1%;
    margin-top: 8%;
    float: left;
}

.sign-load > button {
    width: 94%;
    height: 100%;
    margin-left: 3%;
    outline: none;
    border: 0;
    background-color: #e6e6e6; /* 加载按钮背景色调整 */
}

.sign-load > button:hover {
    background-color: #d4d4d4; /* 鼠标悬浮加载按钮的样式 */
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
                        <a href="" id="pre"></a>
                        <a href="" id="next"></a>
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
                    <span>已连续签到<span id="signTimes">1</span>次，<a href="../indexMenus/signlogs.html">我的签到记录</a></span>
                </div>

                <div class="sign-texts">今日签到</div>

                <!-- 签到用户 -->
                <div class="sign-users" style="display: none;" id="signUsers">
                    <span><img src="../images/<?php echo $pic;?>" onerror="this.style.display='none'" style="height:50px;width:50px;position:relative;top:-8px;"></span>
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

<script type="text/javascript">
        var month_olypic = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];//正常年份12个月对应的天数
        var month_normal = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];//闰年中12个月对应的天数
        var month_name = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];//定义要显示的月份数组
        //获取以上各个部分的id
        var holder = document.getElementById("days");
        var prev = document.getElementById("prev");//上个月份的超链接id
        var next = document.getElementById("next");//下个月份的超链接id
        var ctitle = document.getElementById("calendar-title");
        var cyear = document.getElementById("calendar-year");
        //获取当天的年月日
        var my_date = new Date();
        var my_year = my_date.getFullYear();//获取年份
        var my_month = my_date.getMonth(); //获取月份，下标从0开始
        var my_day = my_date.getDate();//获取当前日期

        //根据年月获取当月第一天是周几
        function dayStart(month, year) {
            var tmpDate = new Date(year, month, 1);
            return (tmpDate.getDay());
        }
        //根据年份判断某月有多少天，主要是区分闰年
        function daysMonth(month, year) {
            var tmp1 = year % 4;
            var tmp2 = year % 100;
            var tmp3 = year % 400;

            if ((tmp1 == 0 && tmp2 != 0) || (tmp3 == 0)) {
                return (month_olypic[month]);//闰年
            } else {
                return (month_normal[month]);//非闰年
            }
        }

        function refreshDate() {
            var str = "";
            //计算当月的天数和每月第一天都是周几
            var totalDay = daysMonth(my_month, my_year);
            var firstDay = dayStart(my_month, my_year);
            //添加每个月前面的空白部分，即若某个月的第一天是从周三开始，则前面的周一，周二需要空出来
            for (var i = 0; i < firstDay; i++) {
                str += "<li>" + "</li>";
            }

            //从一号开始添加到totalDay（每个月的总天数），并为pre，next和当天添加样式
            var myclass;
            for (var i = 1; i <= totalDay; i++) {
                //如果是已经过去的日期，则用浅灰色显示
                if ((my_year < my_date.getFullYear()) || (my_year == my_date.getFullYear() &&
                    my_month < my_date.getMonth()) || (my_year == my_date.getFullYear() &&
                        my_month == my_date.getMonth() && i < my_day)) {
                    myclass = " class='lightgrey'";
                }
                //如果正好是今天，则用绿色显示
                else if (my_year == my_date.getFullYear() && my_month == my_date.getMonth() && i == my_day) {
                    myclass = "class = 'green greenbox'";
                }
                //将来的日期用深灰色显示
                else {
                    myclass = "class = 'darkgrey'";
                }
                str += "<li " + myclass + ">" + i + "</li>";
            }
            holder.innerHTML = str;//为日期的列表标签设置HTML；
            ctitle.innerHTML = month_name[my_month];//设置当前显示的月份
            cyear.innerHTML = my_year;//设置当前显示的年份
        }
        refreshDate();//显示日期，更新界面
        //上个月的点击事件
        pre.onclick = function (e) {
            e.preventDefault();
            my_month--;
            if (my_month < 0) {
                my_year--;
                my_month = 11;
            }
            refreshDate();//更新界面
        }
        //下个月的点击事件
        next.onclick = function (e) {
            e.preventDefault();
            my_month++;
            if (my_month > 11) {
                my_month = 0;
                my_year++;
            }
            refreshDate();//更新界面
        }
        
// 签到按钮
    function sign() {
        var signgo = '已完成';
        document.getElementById('signs').innerHTML = signgo;
        document.getElementById("signLogs").style.display = "block";
        document.getElementById('signUsers').style.display = "block";
        // 获取签到时间
        var data = new Date();
        var year = data.getFullYear(); //获取年份
        var month = data.getMonth() + 1; //获取月份
        var today = data.getDate(); //获取当日
        var year = year.toString();
        var month = month.toString();
        var today = today.toString();
        var nian = '年';
        var yue = '月';
        var ri = '日';
        var o = '0';
        var hours = data.getHours();
        var min = data.getMinutes();
        var mao = ':';
        var signday = year + nian + o + month + yue + o + today + ri; //签到年月日拼接
        var signmin = hours + mao + min; // 签到小时分钟
        document.getElementById('todays').innerHTML = signday; //更新签到日期
        document.getElementById('signMin').innerHTML = signmin; //更新签到时间
    }

    </script>