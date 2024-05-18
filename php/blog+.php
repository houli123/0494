<?php
include "conn.php";
$current_uname = $_SESSION['uname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $btitle = $_POST['btitle'];
    $bcontent = $_POST['bcontent'];
    
    date_default_timezone_set('Asia/Shanghai');
    // 获取当前日期
    $bdate = date("Y-m-d H:i:s"); // 使用DATETIME数据类型
    // 插入数据的准备语句
    $stmt = $conn->prepare("INSERT INTO blog (btitle, bcontent, uname, bdate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $btitle, $bcontent, $current_uname, $bdate);

    // 执行SQL语句并检查结果
    if($stmt->execute()){
        echo "<script>alert('新记录插入成功');location.href='../html/blog.php';</script>";
        // 重定向回博客列表页，确保使用有效的目标URL
    } else {
        echo "Error: " . $stmt->error;
    }
}