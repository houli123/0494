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

//验证表单
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

//图片的上传
if ($pic) {
    $save_dir = "../images/"; 
    $save_file = $save_dir . basename($_FILES["pic"]["name"]);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $save_file);

    // 检查图片是否已经存在
    if (file_exists($save_file)) {
        // 插入新用户
        $sql = "INSERT INTO users (uname, pwd, phone, email, bio, sex,gra,xinzuo,pic,age) VALUES ('$uname', '$pwd', '$phone', '$email', '$bio', '$sex','$gra','$xinzuo','$pic','$age')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('注册成功，请登录');location.href='../html/login.php';</script>";
    } else {
        echo "<script>alert('上传图片时出现错误，请重试');location.href='../html/roll.php';</script>";
    }
}else{
    $pic = '';
    // 插入新用户
    $sql = "INSERT INTO users (uname, pwd, phone, email, bio, sex,gra,xinzuo,pic,age) VALUES ('$uname', '$pwd', '$phone', '$email', '$bio', '$sex','$gra','$xinzuo','$pic','$age')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('注册成功，请登录');location.href='../html/login.php';</script>";
}