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
    <link href="../css/study-image.css" type="text/css" rel="stylesheet" />
    <link href="../css/study.css" type="text/css" rel="stylesheet" />
    <link href="../css/study-main.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="../images/icon/标记.png" sizes="32*32">
    <script src="../js/background.js"></script>
    <style>

/* 当前任务列表盒子样式 */
#todolistBox {
    max-width: 500px;
    margin: 30px auto;
    background-color: #f0fff0;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* 标题样式 */
#top h1 {
    color: #38ef7d;
    margin-bottom: 16px;
}

/* 输入框样式 */
#top input {
    width: 100%;
    padding: 10px;
    border: 2px solid #38ef7d;
    border-radius: 4px;
    margin-bottom: 20px;
}

/* 任务列表样式 */
#todolist li {
    list-style: none;
    background-color: #e6ffe6;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* 任务文本样式 */
.todoText {
    font-size: 16px;
}

/* 按钮通用样式 */
.todoBtn {
    border: none;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 4px;
    margin-left: 10px;
}

/* 完成按钮样式 */
.todoBtn.done {
    background-color: #44b144;
    color: white;
}

/* 删除按钮样式 */
.todoBtn.delete {
    background-color: #ff6868;
    color: white;
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
                    学习空间&nbsp;>&nbsp;ToDoList<a name="shang"></a>
                </div>
                <hr>
                
                <div id="todolistBox">
                    <div id="top">
                        <h1>ToDoList</h1>
                        <input type="text" id="todoInput" placeholder="写下小目标，然后回车~">
                    </div>
                    <ul id="todolist"></ul>
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
    function adjustHeights() {
        var left = document.getElementById('left');
        var right = document.getElementById('right');
        left.style.height = right.offsetHeight-20 + 'px'; // 设置#left的高度与#right相同
    }
    window.onload = function () {
        // 调整高度
            var left = document.getElementById('left');
            var right = document.getElementById('right');
            left.style.height = right.offsetHeight-20 + 'px'; // 设置#left的高度与#right相同
    document.getElementById('todoInput').addEventListener('keydown', function (e) {
        if (e.keyCode === 13 && this.value) {
            const li = document.createElement('li');

            const span = document.createElement('span');
            span.textContent = this.value;
            span.className = 'todoText';
            li.appendChild(span);

            const doneBtn = document.createElement('button');
            doneBtn.innerHTML = '完成';
            doneBtn.className = 'todoBtn done';
            doneBtn.addEventListener('click', function () {
                this.parentElement.style.textDecoration = 'line-through';
            });
            li.appendChild(doneBtn);

            const deleteBtn = document.createElement('button');
            deleteBtn.innerHTML = '删除';
            deleteBtn.className = 'todoBtn delete';
            deleteBtn.addEventListener('click', function () {
                this.parentElement.remove();
            });
            li.appendChild(deleteBtn);

            document.getElementById('todolist').appendChild(li);

            this.value = '';
            }
    });
};


    window.onresize = adjustHeights; // 当窗口尺寸改变时再次调整高度
</script>