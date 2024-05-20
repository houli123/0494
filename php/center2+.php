<?php
include "conn.php";
$pic = $_FILES["pic"]["name"] ? basename($_FILES["pic"]["name"]) : $pic;
$bio = $_POST['bio']?$_POST['bio']:$bio;
// 更新资料
$sql = "UPDATE users SET bio='$bio', pic='$pic' WHERE uname='$uname'";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {
    // 设置session
    $_SESSION['bio'] = $bio;
    $_SESSION['pic'] = $pic;

    //文件的上传
    if (isset($_FILES["pic"]["name"])) {
        $target_dir = "../images/"; // 指定上传目录
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //尝试上传文件
        if(move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            echo "<script>alert('更改成功');location.href='../html/center.php';</script>";
        } else {
            echo "<script>alert('上传文件时出现错误，请重试');location.href='../html/center2.php';</script>";
        }
        $_SESSION['uname'] = $uname;
        $_SESSION['pwd'] = $pwd;
        $_SESSION['pic'] = $pic;
        echo "<script>alert('更改成功');location.href='../html/center2.php';</script>";
    }

} else {
    echo mysqli_error($conn);
    echo "<script>alert('数据库更改失败，请重试');location.href='../html/center2.php';</script>";
}