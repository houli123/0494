<?php
//这是login+.php文件
include "conn.php";

// 检查表单是否提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取用户输入
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    if($uname=="" || $pwd==""){
        echo "<script>alert('用户名密码不能为空');location.href='login+.php';</script>";
    }
    // 验证用户名和密码

    $sql = "SELECT * FROM users WHERE uname = '$uname'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['pwd'] == $pwd) {
        foreach ($row as $key => $value) {
            // 将每个键值对存储到$_SESSION中
            $_SESSION[$key] = $value;
        }
        $_SESSION['uname'] = $uname;
        $_SESSION['pwd'] = $pwd;
        echo "<script>console.log('即将进入首页');location.href='../index.php';</script>";
        
    } else {
        echo "<script>alert('用户名或密码填写错误，请重新登录');location.href='../html/login.php';</script>";
    }
}