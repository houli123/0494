<?php
include "../php/conn.php";


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
        <!-- <div class="search">
            <input type="search" placeholder="Search">
            <a href="#" onclick="alert('查找失败')">
                <i>🔍</i>
            </a>
        </div> -->


        <img id="leaf" src="../images/gif.png" />
        <!-- 最上面那部分 -->
        <div id="head">

            <!-- 导航栏 -->
            <div id="nav">
                <ul>
                    <li><a href="" onclick="alert('请先登录');">主页</a></li>
                    <li><a href="" onclick="alert('请先登录');">学习空间</a></li>

                    <li><a href="" onclick="alert('请先登录');">相册空间</a></li>
                    <li><a href="" onclick="alert('请先登录');">博客空间</a></li>

                    <li><a href="" onclick="alert('请先登录');">个人中心</a></li>
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
                        <li><a href="login.php">登录</a></li>
                        <li><a href="roll.php">注册</a></li>

                    </ul>
                </div>
            </div>

            <!-- 中间右边 -->
            <div id="right">
                <div id="index">
                    个人中心&nbsp;>&nbsp;登录界面
                </div>
                <hr style="opacity: unset;">
                <!-- 以下是正式内容 -->

                <form method="post" action="../index.php">
                    <!-- 下面开始表单 -->
                    <table style="margin-left: auto;
    margin-right: auto;">
                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                用户名：
                            </label>
                            </td>
                            <td>
                                <input class="input_input" type="text" placeholder="请输入账号" style="min-width:150px;">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                密码：
                            </label>
                            </td>
                            <td>
                                <input class="input_input" type="password" placeholder="请输入密码" style="min-width:150px;">
                            </td>
                        </tr>
        
                    
                    </table>
                    <hr>


                    <div class="box">

                        <input type="submit"></input>
                        <input type="reset"></input>

                    </div>
                </form>

            </div>
        </div>



        <!-- 页脚 -->
        <footer>
            深圳职业技术大学——人工智能学院信息楼实验室<br>
            地址：广东省深圳市南山区沙河西路4089号 邮编：518055 <br />电话：0755—2046336

            邮编：518055 电话：0755—2046337
            <br>更多信息：<a href="http://www.szpt.edu.cn" target="_blank">点击官网</a>
        </footer>
    </div>


</body>

</html>