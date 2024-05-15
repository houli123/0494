<?php
include "conn.php";
$pic = basename($_FILES["pic"]["pic"]) ? basename($_FILES["pic"]) : $SESSION['pic'];
$bio = $_POST['bio'] ? $_POST['bio'] : $SESSION['bio'];

// 更新资料
$sql = "UPDATE users SET bio='$bio', pic='$pic' WHERE uname='$uname'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // 设置session
    $_SESSION['bio'] = $bio;
    $_SESSION['pic'] = $pic;

    //文件的上传
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pic"])) {
        $target_dir = "../images/"; // 指定上传目录
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



        // 尝试上传文件
        // if ($uploadOk == 1 && move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        //     echo "<script>alert('更改成功');location.href='../html/center.php';</script>";
        // } else {
        //     echo "<script>alert('上传文件时出现错误，请重试');location.href='../html/center.php';</script>";
        // }
        $_SESSION['uname'] = $uname;
        $_SESSION['pwd'] = $pwd;
        echo "<script>alert('更改成功');location.href='../html/center2.php';</script>";
    }

} else {
    echo mysqli_error($conn);
    echo "<script>alert('更改失败，请重试');location.href='../html/center2.php';</script>";
}