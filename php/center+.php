<?php
include "conn.php";
// 检查表单是否提交
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../html/center.php");
    exit;
}

$pwd = $_POST['pwd'] ? $_POST['pwd'] : $pwd;
$pwd2 = $_POST['pwd2'];
// $email = $_POST['email'] ? $_POST['email'] : $email;
$sex = $_POST['sex'] ? $_POST['sex'] : $sex;
$phone = $_POST['phone'] ? $_POST['phone'] : $phone;
// $bio = $_POST['bio'] ? $_POST['bio'] : $bio;
$gra = $_POST['gra'] ? $_POST['gra'] : $gra;
$xinzuo = $_POST['xinzuo'] ? $_POST['xinzuo'] : $xinzuo;
$age = $_POST['age'] ? $_POST['age'] : $age;

// 从会话中获取用户信息

if (!isset($_POST['pwd2']) && !isset($_POST['pwd']) && $pwd !== $pwd2) {
    echo "<script>alert('两次输入的密码不相同，请重新输入');location.href='../html/center.php';</script>";
    exit;
}


// 更新资料
$sql = "UPDATE users SET pwd='$pwd', phone='$phone', sex='$sex', gra='$gra', xinzuo='$xinzuo', age='$age' WHERE uname='$uname'";
// echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {
    // 设置session
    $_SESSION['uname'] = $uname;
    $_SESSION['pwd'] = $pwd;
    $_SESSION['email'] = $email;
    $_SESSION['sex'] = $sex;
    $_SESSION['phone'] = $phone;
    $_SESSION['gra'] = $gra;
    $_SESSION['xinzuo'] = $xinzuo;
    $_SESSION['age'] = $age;
    echo "<script>alert('基本资料更改成功');location.href='../html/center.php';</script>";
} else {
    echo mysqli_error($conn);
    echo "<script>alert('基本资料更改失败，请重试');location.href='../html/center.php';</script>";
}