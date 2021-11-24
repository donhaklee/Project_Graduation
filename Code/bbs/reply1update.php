<div id="send">
<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    $boardnum = $_POST["reply1updateboardnum"];
    $replynum = $_POST["reply1updatereplynum"];
    $replycontents = $_POST["reply1updatetextarea"];
    $conn = new mysqli("localhost", "root", "6570", "web");
    mysqli_query ($conn, 'SET NAMES utf8');
    $sql = "update reply set replycontents='$replycontents' where boardnum='$boardnum' and replynum='$replynum'";
    $res = $conn->query($sql);
    $sql2 = "select *from reply where boardnum='$boardnum' and replynum='$replynum' and replycontents='$replycontents'";
    $res2 = $conn->query($sql2);
    $row2=mysqli_fetch_array($res2);
    echo $row2['replycontents'];
    echo "<script> alert('수정되었습니다');</script>";
?>
</div>
<script>
parent.document.getElementById("<?php echo "reply1text".$row2['replynum']; ?>").innerHTML = document.getElementById("send").innerHTML;
</script>