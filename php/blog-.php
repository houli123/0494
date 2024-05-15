<?php
include "conn.php";
$page = $_GET['page'];
// 获取当前登录的用户名和博客的 bno
$current_uname = $_SESSION['uname'];
$blog_bno = $_GET['bno'];

// 检查是否获取到了博客的 bno
if (isset($blog_bno)) {
    // 删除数据的准备语句
    $stmt = $conn->prepare("DELETE FROM blog WHERE bno = ? AND uname = ?");
    $stmt->bind_param("is", $blog_bno, $current_uname);

    // 执行SQL语句并检查结果
    if ($stmt->execute()) {
        echo "<script>alert('博客删除成功');location.href='../html/blog.php?page=$page.php';</script>";
        // 重定向回博客列表页
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "<script>alert('没有提供博客用户名');location.href='../html/blog.php';</script>";
}
$conn->close();