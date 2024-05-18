<?php
    include "php/conn.php";
    if(!isset($uname)){
    // echo "<script>console.log('当前未登录');location.href='html/blog.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的个人空间</title>
    <link href="css/index.css" type="text/css" rel="stylesheet" />
    <link rel="icon"  href="images/icon/爱心块状.png">
    <script src="js/background.js" type="tex
    t/javascript"></script>
    <style>
        #right p{
            text-indent: 0.3em;
        }
        #left{
            padding-bottom: 1em;
        }
        
    </style>
</head>

<body>  
    <div id="container">
        <!-- 回到顶部箭头 -->
        <a href="#" id="go-top"><img class="head" src="images/head.png"></a>
        <!-- 搜索框 -->
        <!-- <div class="search">
            <input list="search" placeholder="查看功能位置" />
            <datalist id="search">
                <option value="学习空间-学习记录"></option>
                <option value="学习空间-好言好句"></option>
                <option value="学习空间-学习笔记"></option>
                <option value="学习空间-学习视频"></option>
                <option value="相册空间"></option>
                <option value="博客空间"></option>
                <option value="音乐空间"></option>
                <option value="访问留言"></option>
                <option value="个人中心-更改基本资料"></option>
                <option value="个人中心-更改个人信息"></option>
                <option value="个人中心-更改密码"></option>
            </datalist>
        </div> -->

        <!-- 点击更换背景图片的设置 -->
        <div id="js">
            <img src="images/3.jpg" alt="" class="photo1">
            <img src="images/bak4.png" alt="" class="photo1">
            <img src="images/bak5.png" alt="" class="photo1">
            <img src="images/bak2.png" alt="" class="photo1">
        </div>



        <!-- 落叶 -->
        <img id="leaf" src="images/gif.png" />
        
        <!-- 最上面那部分 -->
        <div id="head">
            <!-- 头部背景图片 -->
            <div id="head-background">
                <img src="images/<?php echo $pic;?>" onerror="this.style.display='none'"/>
            </div>
            <!-- 导航栏 -->
            <div id="nav">
                <ul>
                    <li><a href="index.php">主页</a></li>
                    <li><a href="html/study-main.php">学习空间</a></li>
                    <li><a href="html/album.php">相册空间</a></li>
                    <li><a href="html/blog.php">博客空间</a></li>
                    <li><a href="html/center.php">个人中心</a></li>  <!--表单大集合-->
                </ul>
            </div>
        </div>



        <!-- 中间的一块 -->
        <div id="middle">
            <!-- 中间左边 -->
            <div id="left">
                <div id="head-background">
                    <img id="imgspe" src="images/<?php echo $pic; ?>" onerror="this.style.display='none'" style="width=90px;height=90px;"/>
                </div>

                <!-- 信息这里采用php来实现 -->
                <?php
                // $uname = 'Jack';  //测试用
                
                $sql = "SELECT * FROM users where uname='$uname'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>

                <!-- 姓名框 -->
                <div id="name">
                    <?php echo $row['uname'];?>
                    <!-- Jack -->
                </div>
                <!-- 签名框 -->
                <div id="signature">
                    &nbsp;&nbsp;
                    <?php echo $row['bio']; ?>
                    <!-- 我是一个又菜又爱玩电脑的少年，作为计算机专业的学生， -->
<!-- 我热爱我的专业并为其投入巨大的热情和精力。希望大家能和我一同热爱计算机！ -->
                </div>
                <!-- 性别框 -->
                <div id="sex">
                    <table>
                        <tr>
                            <td>
                                <?php echo $row['sex'] ? $row['sex'] : "&nbsp;"; ?>
                                <!-- 男 -->
                            </td>
                            <td>
                                <?php echo $row['age']."岁"; ?>
                                <!-- 18岁 -->
                            </td>
                            <td>
                                <?php echo $row['xinzuo']?$row['xinzuo']:"&nbsp;"; ?>
                                <!-- 双子座 -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        <!-- 中间右边 -->   
            <div id="right">
                <div id="index">
                    我的个人信息
                </div>
                <hr>
                
                <!-- <div id="my">
                    我的详细资料
                </div> -->
                <div id="basis">
                    <a name="info">基本资料</a>
                </div>
                <div class="basis">
                    <?php echo "<p id='a'>用户名：".$row['uname']."</p>"; ?>
                    <?php echo "<p id='a'>性别：" . $row['sex'] . "</p>"; ?>
                    <?php echo "<p id='a'>年龄：" . $row['age'] . "岁</p>"; ?>
                    <?php echo "<p id='a'>星座：" . $row['xinzuo'] . "</p>"; ?>
                    <?php echo "<p id='a'>手机：" . $row['phone'] . "</p>"; ?>
                    <?php echo "<p id='a'>邮箱：" . $row['email'] . "</p>"; ?>
                    <?php echo "<p id='a'>毕业学校：" . $row['gra'] . "</p>"; ?>
                    <!-- <p id="a">昵称：Jack</p>
                    <p id="a">性别：男</p>
                    <p id="a">年龄：18岁</p>
                    <p id="a">星座：双子座</p>
                    <p id="a">手机：13536627999</p>
                    <p id="a">邮箱：123456789@qq.com</p>
                    <p id="a">毕业学校：深造小学</p> -->
                    
                </div>

                <!-- <div id="prize">
                    个人成就
                </div>
                <div class="exp">
                    
                    <ul class="timeline">
                        <li>三好学生</li>
                        <li>军训标兵</li>
                        <li>优秀班干部 </li>
                        <li>饭堂鸡腿优惠券</li>
                        <li>...</li>
                    </ul>
                
                </div> -->

                
            </div>
        </div>



        <!-- 页脚 -->
        <footer>
            深圳职业技术大学——人工智能学院信息楼实验室<br/>
            地址：广东省深圳市南山区沙河西路4089号 邮编：518055 <br/>电话：0755—2046336

邮编：518055 电话：0755—2046337
<br>更多信息：<a href="http://www.szpt.edu.cn" target="_blank">点击官网</a>
        </footer>
    </div>

    
</body>

</html>

<script>
    var goTopBtn = document.getElementById('go-top');

window.addEventListener('scroll', function () {
    // 当页面滚动到一定位置（例如：200px）时显示按钮，否则隐藏
    if (window.scrollY > 200) {
        goTopBtn.style.display = 'block';
    } else {
goTopBtn.style.display = 'none';
            }
        });

// 为按钮添加点击事件，当点击时页面滚动到顶部
goTopBtn.addEventListener('click', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // 平滑滚动到页面顶部
    });
});



function adjustHeights() {
        var left = document.getElementById('left');
        var right = document.getElementById('right');
        left.style.height = right.offsetHeight-20 + 'px'; // 设置#left的高度与#right相同
    }

    window.onload = adjustHeights;
    window.onresize = adjustHeights; // 当窗口尺寸改变时再次调整高度
</script>