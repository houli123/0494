<?php
include "conn.php";
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$bio = $_POST['bio'];
$gra = $_POST['gra'];
$xinzuo = $_POST['xinzuo'];
$pic = $_FILES["pic"]["name"]?basename($_FILES["pic"]["name"]):"";
// echo $pic;
$age = $_POST['age'];
// echo $uname, $pwd, $email, $sex;
if ($uname==''||$pwd==''||$email==''||$sex==''||$pwd2=='') {
    echo "<script>alert('用户名、密码、电子邮件和性别不能为空');location.href='../html/roll.php';</script>";
}
if ($pwd !== $pwd2) {
    echo "<script>alert('两次输入的密码不相同，请重新输入');location.href='../html/roll.php';</script>";
    exit;
}


// 检查用户名是否已存在
$sql = "SELECT id FROM users WHERE uname = '$uname'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('用户名已存在，请选择其他用户名');location.href='../html/roll.php';</script>";
    exit;
}

    // $_SESSION['uname']=$uname;
    // $_SESSION['pwd']=$pwd;
    // $_SESSION['pwd2'] = $pwd2;
    // $_SESSION['email']=$email;
    // $_SESSION['sex']=$sex;
    // $_SESSION['phone']=$phone;
    // $_SESSION['bio']=$bio;
    // $_SESSION['gra']=$gra;
    // $_SESSION['xinzuo']=$xinzuo;
    // $_SESSION['pic']=$pic;
    // $_SESSION['age']=$age;

//文件的上传
if ($pic) {
    $target_dir = "../images/"; 
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // 检查文件是否已经存在
    // echo $pic;
    // echo basename($_FILES["pic"]["name"]);
    // echo $target_file;
    if (file_exists($target_file)) {
        echo "<script>alert('抱歉，文件已经存在');location.href='../html/roll.php';</script>";
        $uploadOk = 0;
    }

    // 限制允许上传的文件类型
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "<script>alert('抱歉，只允许 JPG, JPEG, PNG & GIF 文件格式。');location.href='../html/roll.php';</script>";
        $uploadOk = 0;
    }

    // 尝试上传文件
    if ($uploadOk == 1 && move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        // 插入新用户
        if ($uploadOk) {
            $sql = "INSERT INTO users (uname, pwd, phone, email, bio, sex,gra,xinzuo,pic,age) VALUES ('$uname', '$pwd', '$phone', '$email', '$bio', '$sex','$gra','$xinzuo','$pic','$age')";
            $result = mysqli_query($conn, $sql);
        }
        echo "<script>alert('注册成功，请登录');location.href='../html/login.php';</script>";
    } else {
        echo "<script>alert('上传文件时出现错误，请重试');location.href='../html/roll.php';</script>";
    }
}else{
    $pic = '';
    // 插入新用户
    if ($uploadOk) {
        $sql = "INSERT INTO users (uname, pwd, phone, email, bio, sex,gra,xinzuo,pic,age) VALUES ('$uname', '$pwd', '$phone', '$email', '$bio', '$sex','$gra','$xinzuo','$pic','$age')";
        $result = mysqli_query($conn, $sql);
    }
    echo "<script>alert('注册成功，请登录');location.href='../html/login.php';</script>";
}