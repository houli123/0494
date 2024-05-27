<?php
include "../php/conn.php";

// 设置默认页码
$page = 0;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
}

// 每页显示的博客数量
$limit = 3;
//偏移量为当前页数乘以每页显示的博客数量
$offset = $page * $limit;

// 获取博客总数
$total = "SELECT COUNT(*) FROM blog";
$result = mysqli_query($conn,$total);
$row = mysqli_fetch_array($result);
$total = $row[0];
//总页数应该是总博客数除以每页显示的博客数量，然后向上取整
$pages = ceil($total / $limit);

// 查询数据库获取博客文章数据
$sql = "SELECT * FROM blog ORDER BY bdate DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的博客空间</title>
    <link href="../css/index.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/用户.png" sizes="32*32">
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
            <div id="index">
                博客空间
            </div>



            <!-- 博客的显示 -->
            <div id="blog-container">
                <?php
                //如果有博客内容
                if (mysqli_num_rows($result) > 0) {
                    // 输出每行数据
                    while($row = mysqli_fetch_assoc($result)) {
                        // echo $row['id'];
                        echo '<div class="blog-segment">';
                        echo '<h2 class="blog-title">'. $row["btitle"] . '</h2>';
                        echo '<p class="blog-author">作者：' . $row["uname"] . ' - 发布时间：' . $row["bdate"] .'</p>';
                        echo '<p class="blog-content">' . $row["bcontent"] .'</p>';
                        echo '<button class="read-more" onclick="more_content(this)">阅读更多</button>';

                        // 如果博客是由当前用户发表的，则显示删除按钮
                        if ($row['uname'] == $uname) {
                            echo "<a class='delete-btn' href='../php/blog-.php?bno=" . $row['bno'] . "&page=" . $page . "' onclick='return confirm(\"你确定要删除这篇博客吗？\")'>删除博客</a>";
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>  

            <!-- 新增博客表单 -->
            <form action="../php/blog+.php" method="post">
                <label for="btitle">要新增的博客标题:</label><br>
                <input type="text" id="btitle" name="btitle"><br><br>
                <label for="bcontent">要新增的博客内容:</label><br>
                <textarea id="bcontent" name="bcontent"></textarea><br><br>
                
                <?php if (isset($_SESSION["uname"])): ?>
                    <input type="submit" value="提交">
                <?php else: ?>
                    <input type="submit" value="提交" disabled title="请登录以提交博客">
                    <p>请<a href="login.php" style="color:green;">登录</a>以提交博客。</p>
                <?php endif; ?>
            </form>

            <!-- 上一页下一页按钮 -->
            <div class="previous-next-buttons">
                <button onclick="ToPage(0)" <?php if ($page == 0)
                    echo "disabled"; ?>>第一页</button>
                <button onclick="ToPage(<?php echo $page - 1; ?>)" <?php if ($page == 0)
                    echo "disabled"; ?>>上一页</button>
                <button onclick="ToPage(<?php echo $page + 1; ?>)" <?php if ($page == $pages - 1)
                    echo "disabled"; ?>>下一页</button>
                <button onclick="ToPage(<?php echo $pages - 1; ?>)" <?php if ($page == $pages - 1)
                    echo "disabled"; ?>>最后一页</button>
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


<script src="../js/background2.js"></script>
<script src="../js/blog.js"></script>