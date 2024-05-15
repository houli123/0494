<?php
include "conn.php";
// 检查必填字段是否为空
$uname = $_POST['uname']?$_POST['uname']:$SESSION['uname'];
$pwd = $_POST['pwd'] ? $_POST['pwd'] : $SESSION['pwd'];
$pwd2 = $_POST['pwd2'] ? $_POST['pwd2'] : $SESSION['pwd2'];
// $email = $_POST['email'] ? $_POST['email'] : $SESSION['email'];
$sex = $_POST['sex'] ? $_POST['sex'] : $SESSION['sex'];
$phone = $_POST['phone'] ? $_POST['phone'] : $SESSION['phone'];
// $bio = $_POST['bio'] ? $_POST['bio'] : $SESSION['bio'];
$gra = $_POST['gra'] ? $_POST['gra'] : $SESSION['gra'];
$xinzuo = $_POST['xinzuo'] ? $_POST['xinzuo'] : $SESSION['xinzuo'];

$age = $_POST['age'] ? $_POST['age'] : $SESSION['age'];

// 从会话中获取用户信息

if ($pwd !== $pwd2) {
    echo "<script>alert('两次输入的密码不相同，请重新输入');location.href='../html/center.php';</script>";
    exit;
}


// 更新资料
$sql = "UPDATE users SET uname='$uname', pwd='$pwd', phone='$phone', sex='$sex', gra='$gra', xinzuo='$xinzuo', age='$age' WHERE uname='$uname'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // 设置session
    $_SESSION['uname'] = $uname;
    $_SESSION['pwd'] = $pwd;
    $_SESSION['email'] = $email;
    $_SESSION['sex'] = $sex;
    $_SESSION['phone'] = $phone;
    // $_SESSION['bio'] = $bio;
    $_SESSION['gra'] = $gra;
    $_SESSION['xinzuo'] = $xinzuo;
    $_SESSION['age'] = $age;

    //文件的上传
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pic"])) {
    //     $target_dir = "../images/"; // 指定上传目录
    //     $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // 尝试上传文件
        // if ($uploadOk == 1 && move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        //     echo "<script>alert('更改成功');location.href='../html/center.php';</script>";
        // } else {
        //     echo "<script>alert('上传文件时出现错误，请重试');location.href='../html/center.php';</script>";
        // }
        $_SESSION['uname'] = $uname;
        $_SESSION['pwd'] = $pwd;
        echo "<script>alert('更改成功');location.href='../html/center.php';</script>";
    }

} else {
    echo mysqli_error($conn);
    echo "<script>alert('更改失败，请重试');location.href='../html/center.php';</script>";
}