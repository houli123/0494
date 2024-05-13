<?php
// 启动会话
session_start();

// 销毁所有会话变量
$_SESSION = array();

// 如果要彻底销毁会话，还需要删除会话cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// 最后，销毁会话
session_destroy();

// 重定向用户到登录页面
echo "<script>console.log('已退出，即将前往登录界面');location.href='../html/login.php';</script>";