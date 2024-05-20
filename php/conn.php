<?php
session_start();
if (isset($_SESSION["uname"])) {
    $uname = $_SESSION['uname'];
    $pwd = $_SESSION['pwd'];
    $email = $_SESSION['email'];
    $sex = $_SESSION['sex'];
    $phone = $_SESSION['phone'];
    $bio = $_SESSION['bio'];
    $gra = $_SESSION['gra'];
    $pic = $_SESSION['pic'];
    $age = $_SESSION['age'];
    $xinzuo = $_SESSION['xinzuo'];
}

$host = 'localhost'; 
$username = 'root';
$password = '123456';
$dbname = 'p_s';
$conn = mysqli_connect($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}