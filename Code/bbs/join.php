<?php
header("Content-Type: text/html; charset=UTF-8");
$conn = new mysqli("localhost", "root","6570","web");
mysqli_query($conn,'SET NAMES utf8');
$id = $_POST['id'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
if($id == null || $nickname == null || $password==null ){
    echo "<script> alert('미기입 정보가 있습니다');
            location.href= 'join.html';</script>";
} else{
$sql = "insert into member (id,nickname,password) values ('$id', '$nickname', '$password')";
$res = $conn->query($sql);
echo "<script> location.href = 'login.html';</script>";
}
?>