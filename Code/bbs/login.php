<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    $conn = new mysqli("localhost", "root","6570","web");
    mysqli_query($conn,'SET NAMES utf8');
    $id = $_POST['id'];
    $password = $_POST['password'];
    $sql = "select * from member where id = '$id' and password = '$password'";
    $res = $conn->query($sql);
    $row = mysqli_fetch_array($res);
    if($res -> num_rows > 0) {
        $_SESSION['id'] = $id;
        $_SESSION['nickname'] = $row["nickname"];
        if(isset($_SESSION['id']) && isset($_SESSION['nickname'])){
            echo "<script> location.href = '/Graduation_Project/bbs/board.php';</script>";
        } else {
            echo "<script> alert('등록된 아이디가 없습니다');
                location.href = '/Graduation_Project/bbs/board.php';
            </script>";
        }
    } else {
        echo "<script> alert('등록된 아이디가 없습니다');
        location.href = '/Graduation_Project/bbs/board.php'; </script>";
    }
?>