<?php
include "conn.php";
$page = $_GET['page'];
// 获取当前登录的用户名和博客的 bno
$uname = $_SESSION['uname'];
$bno = $_GET['bno'];

// 检查是否获取到了博客的 bno
if (isset($bno)) {
    // 删除数据的准备语句
    $sql="DELETE FROM blog WHERE bno = '$bno' AND uname = '$uname'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('博客删除成功');location.href='../html/blog.php?page=$page.php';</script>";
    }else{
        echo "<script>alert('博客删除失败');location.href='../html/blog.php?page=$page.php';</script>";
    }
} else {
    echo "<script>alert('没有提供要删除的博客');location.href='../html/blog.php';</script>";
}