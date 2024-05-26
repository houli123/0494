<?php
include "conn.php";
// 检查表单是否提交
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../html/center.php");
    exit;
}

$pic = $_FILES["pic"]["name"] ? basename($_FILES["pic"]["name"]) : $pic;
$bio = $_POST['bio']?$_POST['bio']:$bio;
// 设置session
$_SESSION['bio'] = $bio;
$_SESSION['pic'] = $pic;
$_SESSION['uname'] = $uname;
$_SESSION['pwd'] = $pwd;
// 更新资料
$sql = "UPDATE users SET bio='$bio', pic='$pic' WHERE uname='$uname'";
// echo $sql;

$save_dir = "../images/"; // 指定上传目录
$save_file = $save_dir . basename($_FILES["pic"]["name"]);
//图片的上传
if (file_exists($save_file)) {
    unlink($save_file);
    //上传新图
    move_uploaded_file($_FILES['pic']['tmp_name'], $save_file);
}else{
    move_uploaded_file($_FILES['pic']['tmp_name'], $save_file);
}
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('其他资料更改成功');location.href='../html/center2.php';</script>";
} else {
    echo "<script>alert('修改数据库出现错误，请重试');location.href='../html/center2.php';</script>";
}