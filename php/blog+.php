<?php
include "conn.php";
$uname = $_SESSION['uname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $btitle = $_POST['btitle'];
    $bcontent = $_POST['bcontent'];

    date_default_timezone_set('Asia/Shanghai');
    // 获取当前日期
    $bdate = date("Y-m-d H:i:s"); // 使用DATETIME数据类型
    //插入
    $sql = "INSERT INTO blog (btitle, bcontent, uname, bdate) VALUES ('$btitle', '$bcontent', '$uname', '$bdate')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('博客发布成功');location.href='../html/blog.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}else{
    header("Location: ../html/blog.php");
    exit;
}