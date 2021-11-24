<div id="send">
<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$boardnum = $_POST["reply1deleteboardnum"];
$replynum = $_POST["reply1deletereplynum"];
$conn = new mysqli("localhost", "root", "6570", "web");
mysqli_query ($conn, 'SET NAMES utf8');
$sql = "delete from reply where boardnum='$boardnum' and replynum='$replynum'";
$res = $conn->query($sql);
$sql2 = "select *from reply where boardnum='$boardnum' and replynum='$replynum'";
$res2 = $conn->query($sql2);
if($res2->num_rows == 0) {
echo "<script>alert('삭제 되었습니다.');</script>";
}
?>
</div>
<script>
parent.document.getElementById("<?php echo "reply1show".$replynum; ?>").innerHTML = document.getElementById("send").innerHTML;
</script>