<!-- 这是login.php文件 -->

<?php
include "../php/conn.php";
if(isset($_SESSION['uname'])){
    header("location:center.php");
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
    <style>
    label.xrequired:before {
        content: '* ';
        color: red;
    }
    body {
            background-image: url("../images/3.jpg");
        }
    </style>
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
                    <li><a href="" >博客空间</a></li>
                    <li><a href="">个人中心</a></li>
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
                    个人中心&nbsp;>&nbsp;注册界面
                </div>
                <hr style="opacity: unset;">
                <!-- 以下是正式内容 -->

                <form method="post" action="../php/roll+.php" enctype="multipart/form-data">
                    <!-- 下面开始表单 -->
                    <table style="margin-left: auto;
    margin-right: auto;">
                        <tr>
                            <td>
                                <label class="input_label input_label1 xrequired" style="top:0px;">
                                用户名：
                            </label>
                            </td>
                            <td>
                                <input name="uname" class="input_input" type="text" placeholder="请输入用户名" style="min-width:200px;">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1 xrequired" style="top:0px;">
                                密码：
                            </label>
                            </td>
                            <td>
                                <input name="pwd" class="input_input" type="password" placeholder="请输入密码" style="min-width:200px;">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1 xrequired" style="top:0px;">
                                再次输入密码：
                            </label>
                            </td>
                            <td>
                                <input name="pwd2" class="input_input" type="password" placeholder="请再次输入密码" style="min-width:200px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="input_label input_label1 xrequired" style="top:0px;">
                                邮箱：
                            </label>
                            </td>
                            <td>
                                <input name="email" class="input_input" type="email" placeholder="请输入邮箱" style="min-width:200px;">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1 xrequired" style="top:0px;">
                                性别：
                            </label>
                            </td>
                            <td>
                                <input name="sex" type="radio" value="男" style="min-width:10px;">男
                                <input name="sex" type="radio" value="女" style="min-width:10px;">女
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="input_label input_label1 " style="top:0px;">
                                年龄：
                            </label>
                            </td>
                            <td>
                                <input name="age" class="input_input" type="text" placeholder="请输入年龄" style="min-width:200px;">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                手机号：
                            </label>
                            </td>
                            <td>
                                <input name="phone" class="input_input" type="text" placeholder="请输入手机号" style="min-width:200px;">
                            </td>
                        </tr>

                        

                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                星座：
                            </label>
                            </td>
                            <td>
                                <select name="xinzuo" class="input_input" style="min-width:233px;">
                                <option value="">请选择</option>
                                    <option value="白羊座">白羊座</option>
                                    <option value="金牛座">金牛座</option>
                                    <option value="双子座">双子座</option>
                                    <option value="巨蟹座">巨蟹座</option>
                                    <option value="狮子座">狮子座</option>
                                    <option value="处女座">处女座</option>
                                    <option value="天秤座">天秤座</option>
                                    <option value="天蝎座">天蝎座</option>
                                    <option value="射手座">射手座</option>
                                    <option value="摩羯座">摩羯座</option>
                                    <option value="水瓶座">水瓶座</option>
                                    <option value="双鱼座">双鱼座</option>
                                </select>
                            </td>
        
                        </tr>

                        

                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                毕业学校：
                            </label>
                            </td>
                            <td>
                                <input name="gra" class="input_input" type="password" placeholder="请输入毕业学校" style="min-width:200px;">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                个人介绍：
                            </label>
                            </td>
                            <td>
                                <textarea name="bio" class="input_input" placeholder="请输入个人介绍" style="min-width:280px;min-height:300px;"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="input_label input_label1" style="top:0px;">
                                个人照片：
                            </label>
                            </td>
                            <td>
                                <input name="pic" type="file" style="position:relative;right:-3em">
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

<script>
    function adjustHeights() {
        var left = document.getElementById('left');
        var right = document.getElementById('right');
        left.style.height = right.offsetHeight-20 + 'px'; // 设置#left的高度与#right相同
    }

    window.onload = adjustHeights;
    window.onresize = adjustHeights; // 当窗口尺寸改变时再次调整高度
</script>