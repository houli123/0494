<?php
include "../php/conn.php";
if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    // header("Location:center.php");
} else {
    // $uname = "";
    // echo "<script>console.log('当前未登录，即将进入登陆界面');</script>";
    // header("Location:login.php");
}

// 设置默认页码
$page = 0;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
}

// 每页显示的博客数量
$limit = 3;
$offset = $page * $limit;

// 获取博客总数
$total_sql = "SELECT COUNT(*) FROM blog";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_array();
$total = $total_row[0];
$total_pages = ceil($total / $limit);

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
    <link href="../css/study-image.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/用户.png" sizes="32*32">
    <script src="../js/background.js"></script>
    <style>
        body {
            background-image: url("../images/3.jpg");
        }
        /* 分页按钮的样式 */
.pagination {
    margin: 20px 0;
}

.pagination button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-right: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.pagination button[disabled] {
    background-color: #CCCCCC;
    cursor: not-allowed;
}

/* 在这里添加CSS样式 */
.blog-summary {
    background-color: #E0F2F1;
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 10px;
}

.blog-title {
    color: #00c853;
    font-weight: bold;
}

.blog-content {
    display: none;
    color: #388E3C;
}

.blog-info {
    font-size: 0.8em;
    color: #009688;
}

.read-more {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
}

/* 添加博客表单的样式 */
form {
    background-color: #FAFAFA;
    padding: 20px;
    margin: 20px auto;
    width: 50%;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

form input[type=text],
form textarea {
    width: calc(100% - 24px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #BDBDBD;
    border-radius: 4px;
}

form input[type=submit] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

/* 删除博客按钮的样式 */
.delete-btn {
    background-color: #FF5252;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
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
            <a href="#" onclick="alert('查找失败')">
                <i>🔍</i>
            </a>
        </div>


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
            <div id="blog-container">
                
                <?php
                if ($result->num_rows > 0) {
                // 输出每行数据
                while($row = $result->fetch_assoc()) {
                        // echo $row['id'];
                echo '<div class="blog-summary">';
                echo '<h2 class="blog-title">'. $row["btitle"] . '</h2>';
                echo '<p class="blog-info">作者：' . $row["uname"] . ' - 发布时间：' . $row["bdate"] .'</p>';
                echo '<p class="blog-content">' . $row["bcontent"] .'</p>';
                echo '<button class="read-more" onclick="toggleContent(this)">阅读更多</button>';
                    // 如果博客是由当前用户发表的，则显示删除按钮
                    if ($row['uname'] == $uname) {
                            echo "<a class='delete-btn' href='../php/blog-.php?bno=" . $row['bno'] . "&page=" . $page . "' onclick='return confirm(\"你确定要删除这篇博客吗？\")'>删除博客</a>";
                    }
                echo '</div>';
                }
                }
                ?>

                <!-- 博客文章循环 -->
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <!-- 博客文章展示逻辑 -->
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>未找到博客文章。</p>
                <?php endif; ?>
            </div>  

            <form action="../php/blog+.php" method="post">
    <label for="btitle">要新增的博客标题:</label><br>
    <input type="text" id="btitle" name="btitle"><br><br>
    <label for="bcontent">要新增的博客内容:</label><br>
    <textarea id="bcontent" name="bcontent"></textarea><br><br>
    
    <?php if (isset($_SESSION["uname"])): ?>
                    <input type="submit" value="提交">
                <?php else: ?>
                    <input type="submit" value="提交" disabled title="请登录以提交博客">
                    <p>请<a href="login.php">登录</a>以提交博客。</p>
                <?php endif; ?>
            </form>
        </div>

        

        <!-- 分页按钮 -->
<div class="pagination">
  <button onclick="navigateToPage(0)" <?php if ($page == 0)
                echo "disabled"; ?>>第一页</button>
            <button onclick="navigateToPage(<?php echo $page - 1; ?>)" <?php if ($page == 0)
                   echo "disabled"; ?>>上一页</button>
            <button onclick="navigateToPage(<?php echo $page + 1; ?>)" <?php if ($page == $total_pages - 1)
                   echo "disabled"; ?>>下一页</button>
            <button onclick="navigateToPage(<?php echo $total_pages - 1; ?>)" <?php if ($page == $total_pages - 1)
                   echo "disabled"; ?>>最后一页</button>
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
  function toggleContent(button) {
    var content = button.previousElementSibling;
    var isVisible = content.getAttribute('data-visible');

    if (isVisible === 'true') {
      content.style.display = 'none';
      content.setAttribute('data-visible', 'false');
      button.textContent = '阅读更多';
    } else {
      content.style.display = 'block';
      content.setAttribute('data-visible', 'true');
      button.textContent = '收起';
    }
  }
  function navigateToPage(page) {
      window.location.href = '?page=' + page;
  }
</script>