<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="css/board.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="slick/slick.css" />
    <link rel="stylesheet" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/templatemo-dream-pulse.css" />
</head>
<body>
    

<center>
<section class="row tm-section">
        
        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <div class="col-12">
            <div class="w-100 tm-double-border-1 tm-border-gray">
                <div class="tm-double-border-2 tm-border-gray tm-box-pad">
             <h3 style="text-align:left;"><a href="/Graduation_Project/index.html"><b>Photo Drawing A.I</a></h3><b>
                <div style="text-align:left;">
                    <?php 
                    header("Content-Type: text/html; charset=UTF-8");
                    session_start();?>
                    <?php if((!isset($_SESSION['id'])) && (!isset($_SESSION['nickname']))) {?>
                        <a href="/Graduation_Project/bbs/join.html">회원가입</a>&nbsp;&nbsp;
                        <a href="/Graduation_Project/bbs/login.html">로그인</a>
                    <?php } else {?>
                        <a href="/Graduation_Project/bbs/logout.php">로그아웃</a>
                    <?php }?>
                    </div>
                    <div  style="text-align:left;"><a href="board.php">게시판</a><br></div>
                        <h2 style="text-align:center; color:#B0C4DE"><b>게시글</h2>
                        <div class="tm-gallery-wrap">
                        
	
    <?php 
    header("Content-Type: text/html; charset=UTF-8");
    $conn = new mysqli("localhost", "root", "6570", "web");
    mysqli_query ($conn, 'SET NAMES utf8');
    $boardnum=$_GET['x'];
    $cookie_name = $boardnum;
    $cookie_value = "1"; 
    setcookie($cookie_name, $cookie_value, time() + (86400), "/"); 
    if(!isset($_COOKIE[$cookie_name])) { 
        $sql2 = "UPDATE board set hit=hit+1 WHERE boardnum=$boardnum";
        $res2 = $conn->query($sql2);
    }
    $sql = "select *from board where boardnum='$boardnum'";
    $res = $conn->query($sql);
    $row=mysqli_fetch_array($res);
    if($res->num_rows!=1) {
    echo "<script>alert('존재하지 않는 게시물 경로입니다.'); location.href='/Graduation_Project/bbs/board.php';</script>";
    exit();
    }
    ?>
    <!--게시글 제목부분-->
    <div style="border:1px solid; overflow:auto; text-align:center; margin:0 auto;color:white" >
    <center>
        <table style="text-align:center">
        <!--  <?php $title=str_replace(">","&gt",str_replace("<","&lt",$row['boardtitle'])); echo $title; ?> -->
            <tr>
                <th style="border:1px solid; color:#eeeeee" colspan="3">제목 : <?php $title=str_replace(">","&gt;",str_replace("<","&lt;",$row['boardtitle'])); echo $title; ?></th>
            </tr>
            <tr>
                <th style="border:1px solid; color:#eeeeee">작성자 : <?php echo $row['nickname']; ?></th>
                <th style="border:1px solid; color:#eeeeee">작성일 : <?php echo $row['date']; ?></th>
                <th style="border:1px solid;color:#eeeeee">조회수 : <?php echo $row['hit']; ?></th>
            </tr>
            <tr></tr>
        </table>
</center>
    </div>

    <!--게시글 내용부분-->
    <div style="border:1px solid; overflow:auto;  margin:0 auto; color:white">
    <div style="margin-top:10px; margin-left:10px; margin-bottom : 10px; text-align:left"><?php  echo str_replace("＆","&",$row['boardcontents']); ?></div>
    <div><?php $sql2 = "select *from upload where starttime='".$row['starttime']."' and nickname='".$row['nickname']."'";
    $res2 = $conn->query($sql2);
    while($row2=mysqli_fetch_array($res2)) {
        echo "<div style='margin-left:10px;'>";
        echo "<img src='".$row2['changename']."'>";
        //echo "<div><a href='/Graduation_Project/bbs/download.php?filepath=".$row2['changename']."&filename=".$row2['realname']."'>".$row2['realname']."</a></div>";
        echo "</div>";
    }
?></div>
    </div>

    <?php if(isset($_SESSION['nickname'])) { 
    if($_SESSION['nickname'] == $row['nickname']) {
    echo "<div style=' margin:0 auto; text-align: right; color:white'>";
    echo "<a href='/Graduation_Project/bbs/boardupdate.php?boardnum=".$row['boardnum']."'style=' background:none; color:#6699FF!important'>게시물 수정</a>&nbsp&nbsp";
    echo "<a href='/Graduation_Project/bbs/boarddelete.php?boardnum=".$row['boardnum']."'style='  background:none; color:#FF6666!important'>게시물 삭제</a>";
    echo "</div>";
    } 
} ?>

	



    <iframe name="reply1" style="display:none;  "></iframe>
    <div id="replys" style="border:1px solid; overflow:auto;position:relative; margin:0 auto; text-align:left; color:white">
    <?php
    $sql3="SELECT * FROM reply WHERE boardnum=$boardnum ORDER BY reply.replynum DESC limit 5";
    $res3 = $conn->query($sql3);
    $savenum="0";
    $count="0";
    while($row3=mysqli_fetch_array($res3)) {
    $count++;
    if($count=="5") {
    if($savenum=="0") {
    $savenum=$row3['replynum'];
    }
    }
    echo "<div style=margin:10px 0px 0px 0px; id=\"reply1show".$row3['replynum']."\">".$row3['nickname']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".date('[20y. m. d. h:i:s]',$row3['starttime'])."<br><span id=\"reply1text".$row3['replynum']."\">".str_replace("<","&lt;",$row3['replycontents'])."</span><br>";

    if(isset($_SESSION['nickname'])) {
    if($_SESSION['nickname'] == $row3['nickname']) {
    echo "<span style = 'cursor:pointer; color:#6699FF;' onclick='reply1update(".$row3['replynum'].")'>수정 </span>";

    echo "<span style = 'cursor:pointer; color:#FF6666;'onclick='reply1delete(".$row3['replynum']."); reply1deleteformid".$row3['replynum'].".submit();'>삭제 </span>";
    echo "<form id='reply1deleteformid".$row3['replynum']."' action='reply1delete.php' method='post' target='reply1'>";
    echo "<input type='hidden' name='reply1deleteboardnum' value='".$boardnum."'>";
    echo "<input type='hidden' name='reply1deletereplynum' value='".$row3['replynum']."'>";
    echo "</form>";
    //댓글 수정란
    echo "<fieldset id='reply1updateid".$row3['replynum']."' style='margin-top:20px; display:none;'>";
    echo "<legend>댓글 수정하기</legend>";
    echo "<form id='reply1updateformid".$row3['replynum']."' action='reply1update.php' method='post' target='reply1'>";
    echo "<input type='hidden' name='reply1updateboardnum' value='".$boardnum."'>";
    echo "<input type='hidden' name='reply1updatereplynum' value='".$row3['replynum']."'>";
    echo "<textarea type='text' name='reply1updatetextarea' style='width:100%; height:100px; border:1px solid; resize:none;'>".str_replace("<","&lt",$row3['replycontents'])."</textarea>";
    echo "</form>";
    echo "<button  style='float:right; border:1px solid; background:none; color:white' onclick='reply1updatecancel(".$row3['replynum'].")'>취소</button><button style='float:right; border:1px solid; background:none; color:white' onclick='reply1updateformid".$row3['replynum'].".submit()'>댓글 수정</button>";
    echo "</fieldset>";
    }
    }
    echo "<br><br></div>";
    }
    $sql4="SELECT * FROM reply WHERE boardnum=$boardnum ORDER BY reply.replynum DESC";
    $res4 = $conn->query($sql4);
    if($res4->num_rows > 5) {
    echo "<p id='rcb' style='text-align:center;' onclick=\"this.style.display='none';+reply1limitfunction($savenum)&reply1moreid.submit()\">더보기</p>";
    }
    ?>
    </div>
    <form id="reply1moreid" action="reply1more.php" method="post" target="reply1m">
    <input type="hidden" name="reply1boardnum" value="<?php echo $boardnum; ?>">
    <input type="hidden" id="reply1replynumid" name="reply1replynum">
    </form>
    <iframe name="reply1m" style="display:none;"></iframe>
	

    <!-- 댓글 작성란-->
    <?php if(isset($_SESSION['nickname'])) { ?>
    <form id="reply1applyid" action="reply1apply.php" method="post" target="reply1">
    <fieldset style="margin-top:20px; margin:0 auto;color:white">
    <legend>댓글 작성하기</legend>
    <input type="hidden" name="reply1boardnum" value="<?php echo $row['boardnum']; ?>">
    <textarea type="text" name="reply1textarea" style="width:100%; height:100px; border:1px solid; resize:none;"></textarea>
    <input type="hidden" name="reply1nickname" value="<?php echo $_SESSION['nickname']; ?>">
    <input type="submit" style='float:right; border:1px solid; background:none; color:white' value="댓글 등록">
    </fieldset>
    </form>
    <?php } ?>


    </div>
									</div>
									
								</div>
							</div>
							</div>
					</section>
                    </center>


    <script>
    var rn1=0;
    function reply1update(rbs1) {
    if(rn1 != 0) {
    document.getElementById('reply1updateid'+rn1).style.display = 'none';
    rn1=0;
    }
    document.getElementById('reply1updateid'+rbs1).style.display = 'block';
    rn1=rbs1;
    }

    function reply1delete(rbs1) {
    if(rn1 != 0) {
    document.getElementById('reply1updateid'+rn1).style.display = 'none';
    rn1=0;
    }
    }

    function reply1updatecancel(rbs1) {
    document.getElementById('reply1updateid'+rbs1).style.display = 'none';
    rn1=0;
    }

    function reply1limitfunction(r1rni) {
    document.getElementById("reply1replynumid").value = r1rni;
    }
</script>


<center>
        <div class="col-12">
            <div class="w-100 tm-double-border-1 tm-border-gray">
                <div class="tm-double-border-2 tm-border-gray tm-box-pad">

                    <p style ='color:white'>건의게시판입니다. 사이트 내에 사용된 A.I기술에 대한 질문이나 개선사항이 있다면 게시글을 올려주세요
                </p>
                </div>        
            </div>              
        </div>              
</center>
</body>
</html>