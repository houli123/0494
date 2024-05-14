<?php
include "conn.php";
// 检查必填字段是否为空
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$bio = $_POST['bio'];
$gra = $_POST['gra'];
$xinzuo = $_POST['xinzuo'];
$pic = basename($_FILES["pic"]["name"]);
// echo $pic;
$age = $_POST['age'];
// echo $uname, $pwd, $email, $sex;
if ($uname==''||$pwd==''||$email==''||$sex==''||$pwd2=='') {
    echo "<script>alert('用户名、密码、电子邮件和性别不能为空');location.href='../html/roll.php';</script>";
}

// 从会话中获取用户信息

if ($pwd !== $pwd2) {
    echo "<script>alert('两次输入的密码不相同，请重新输入');location.href='../html/roll.php';</script>";
    exit;
}



// 进行输入验证
// 例如，检查用户名是否已存在
$sql = "SELECT id FROM users WHERE uname = '$uname'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('用户名已存在，请选择其他用户名');location.href='../html/roll.php';</script>";
    exit;
}


// 插入新用户
$sql = "INSERT INTO users (uname, pwd, phone, email, bio, sex,gra,xinzuo,pic,age) VALUES ('$uname', '$pwd', '$phone', '$email', '$bio', '$sex','$gra','$xinzuo','$pic','$age')";
$result = mysqli_query($conn, $sql);

if ($result) {
    // 设置session
    $_SESSION['uname']=$uname;
    $_SESSION['pwd']=$pwd;
    $_SESSION['pwd2'] = $pwd2;
    $_SESSION['email']=$email;
    $_SESSION['sex']=$sex;
    $_SESSION['phone']=$phone;
    $_SESSION['bio']=$bio;
    $_SESSION['gra']=$gra;
    $_SESSION['xinzuo']=$xinzuo;
    $_SESSION['pic']=$pic;
    $_SESSION['age']=$age;

    //文件的上传
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pic"])) {
        $target_dir = "../images/"; // 指定上传目录
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        // 检查文件是否已经存在
        if (file_exists($target_file)) {
            echo "<script>alert('抱歉，文件已经存在');location.href='../html/roll.php';</script>";
            $uploadOk = 0;
        }

        // 其他检查，例如文件大小、文件类型等
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
            echo "<script>alert('注册成功，请登录');location.href='../html/login.php';</script>";
        } else {
            echo "<script>alert('上传文件时出现错误，请重试');location.href='../html/roll.php';</script>";
        }
    }
    
} else {
    echo mysqli_error($conn);
    echo "<script>alert('注册失败，请重试');location.href='../html/roll.php';</script>";
}