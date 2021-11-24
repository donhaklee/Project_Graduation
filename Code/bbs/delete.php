<!DOCTYPE html>
<html>
<style>
a {
text-decoration:none; 
color:black;'
}
</style>
<body>
<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    $conn = new mysqli("localhost","root","6570","web");
    mysqli_query($conn,'SET NAMES utf8');
    if(isset($_GET['filename'])){ 
        $file = $_GET['filename'];  
    $sql = "SELECT *from upload where changename = '$file'";
    $res = $conn->query($sql);
    $row=mysqli_fetch_array($res);
    if($row['nickname'] == $_SESSION['nickname']) {
        $sql2 = "DELETE FROM upload where changename='$file'";
        $res2 = $conn->query($sql2);
        unlink($file);
        }
    }
    $sql3 = "SELECT *FROM upload WHERE nickname='".$_SESSION['nickname']."' AND starttime='".$_GET['time']."'";
        $res3 = $conn->query($sql3);
        while($row2=mysqli_fetch_array($res3)) {
        echo "<div><a href='/Graduation_Project/bbs/download.php?filepath=".$row2['changename']."&filename=".$row2['realname']."'>".$row2['realname']."</a><a style='float:right' href='delete.php?filename=".$row2['changename']."&time=".$row2['starttime']."'>삭제</a></div><br>";
        }
?>
</body>
</html>