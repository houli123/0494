<?php
// 启动会话
session_start();
// 销毁所有会话变量
$_SESSION = array();
// 销毁会话
session_destroy();
// 重定向用户到登录页面
echo "<script>console.log('已退出，即将前往登录界面');location.href='../html/login.php';</script>";