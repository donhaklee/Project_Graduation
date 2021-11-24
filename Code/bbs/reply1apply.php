<div id="send">
    <?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    $boardnum = $_POST["reply1boardnum"];
    $replycontents = $_POST["reply1textarea"];
    $replycontents = addslashes($replycontents);
    $starttime = time();
    $conn = new mysqli("localhost", "root", "6570", "web");
    mysqli_query ($conn, 'SET NAMES utf8');
    $sql = "SELECT MAX(replynum) AS replynum FROM reply WHERE boardnum = '$boardnum'";
    $res = $conn->query($sql);
    $row=mysqli_fetch_array($res);
    $replynum=($row['replynum']+1);
    $sql2 = "insert into reply (boardnum, replynum, replycontents, nickname, starttime) values('$boardnum',
    '$replynum','$replycontents','".$_SESSION['nickname']."','$starttime')";
    $res2 = $conn->query($sql2);
    $sql3 = "select *from reply where boardnum='$boardnum' and replynum='$replynum' and nickname='".$_SESSION['nickname']."'
    and replycontents='$replycontents' and starttime='$starttime'";
    $res3 = $conn->query($sql3);
    $row3=mysqli_fetch_array($res3);
    echo "<div id=\"reply1show".$row3['replynum']."\">".$row3['nickname']." ".date('y년 m월 d일 h시 i분 s초',$row3['starttime'])."<br><span id=\"reply1text".$row3['replynum']."\">".str_replace("<","&lt;",$row3['replycontents'])."</span><br>";

    if(isset($_SESSION['nickname'])) {
    if($_SESSION['nickname'] == $row3['nickname']) {
    echo "<span onclick='reply1update(".$row3['replynum'].")'>수정 </span>";

    echo "<span onclick='reply1delete(".$row3['replynum']."); reply1deleteformid".$row3['replynum'].".submit();'>삭제 </span>";
    echo "<form id='reply1deleteformid".$row3['replynum']."' action='reply1delete.php' method='post' target='reply1'>";
    echo "<input type='hidden' name='reply1deleteboardnum' value='".$boardnum."'>";
    echo "<input type='hidden' name='reply1deletereplynum' value='".$row3['replynum']."'>";
    echo "</form>";

    echo "<fieldset id='reply1updateid".$row3['replynum']."' style='margin-top:20px; display:none;'>";
    echo "<legend>댓글 수정란</legend>";
    echo "<form id='reply1updateformid".$row3['replynum']."' action='reply1update.php' method='post' target='reply1'>";
    echo "<input type='hidden' name='reply1updateboardnum' value='".$boardnum."'>";
    echo "<input type='hidden' name='reply1updatereplynum' value='".$row3['replynum']."'>";
    echo "<textarea type='text' name='reply1updatetextarea' style='width:100%; height:100px; border:1px solid; resize:none;'>".str_replace("<","&lt",$row3['replycontents'])."</textarea>";
    echo "</form>";
    echo "<button style='float:right; border:1px solid; background:none;' onclick='reply1updatecancel(".$row3['replynum'].")'>취소</button><button style='float:right; border:1px solid; background:none;' onclick='reply1updateformid".$row3['replynum'].".submit()'>댓글 수정</button>";
    echo "</fieldset>";
    }
    }
    echo "<br><br></div>";
    ?>
</div>
<script>
parent.document.getElementById("replys").innerHTML = document.getElementById("send").innerHTML + parent.document.getElementById("replys").innerHTML;
</script>