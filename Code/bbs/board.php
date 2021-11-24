<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <section  class="row tm-section">
        
 <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 
 <div class="col-12">
     <div class="w-100 tm-double-border-1 tm-border-gray">
         <div class="tm-double-border-2 tm-border-gray tm-box-pad">
             <h3 style="text-align:left;"><a href="/Graduation_Project/index.html" ><b>Photo Drawing A.I</a></h3><b>
    
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

             <div class="tm-gallery-wrap">
             <h1 style="text-align:center; color:#B0C4DE"><b>게시판</h1>
                 
                 <div class="mt-3 container file-upload">
                            <div class="con">
                                <?php
                                    header("Content-Type: text/html; charset=UTF-8");
                                    $conn = new mysqli("localhost","root","6570","web");
                                    mysqli_query($conn, 'SET NAMES utf8');
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    if(isset($_GET['pagination'])){
                                        $pagination = $_GET['pagination'];
                                    } else {
                                        $pagination = 1;
                                    }
                                    $sql = "select *from board";
                                    $res = $conn->query($sql);
                                    $totalboardnum = mysqli_num_rows($res);
                                    $totalpagenum = ceil($totalboardnum/10);
                                    $totalblocknum = ceil($totalpagenum/5);
                                    $currentpagenum = (($page-1)*10);
                                    $sql2 = "select *from board order by boardnum desc limit $currentpagenum,10";
                                    $res2 = $conn->query($sql2);
                                    $num2=$totalboardnum-(($page-1)*10); 
                                ?>
                                <table style="border:1px solid;  text-align:center; margin:0 auto;color:#eeeeee"> 
                                <tr> 
                                    <th> 번호 </th> 
                                    <th> 제목</th>
                                    <th> 작성자</th>
                                    <th> 작성일</th>
                                    <th>조회수</th>
                                </tr>
                                <?php 
                                
                                while ($row=mysqli_fetch_array($res2)) {
                                    $num=$row['boardnum'];
                                    $title=str_replace(">","&gt;",str_replace("<","&lt;",str_replace($row['boardtitle'], mb_substr($row['boardtitle'],0,40,"utf-8")."...",$row['boardtitle'])));
                                    $title2=str_replace(">","&gt;",str_replace("<","&lt;",$row['boardtitle']));
                                ?>
                                <!-- 게시글 리스트-->
                                <tr style = "cursor:pointer; text-align:center" onClick = "location.href='/Graduation_Project/bbs/boardread.php?x=<?php echo $num;?>'">

                                    <th style="border:1px solid;width:50px; color:#eeeeee"><?php echo $num2;?></th>
                                    <th style="border:1px solid;width:500px;color:#eeeeee"><?php if(mb_strlen($row['boardtitle'],"utf-8") > 30) {echo $title;} else {echo $title2;}?></th>
                                    <th style="border:1px solid;width:100px;color:#eeeeee"><?php echo $row['nickname'];?></th>
                                    <th style="border:1px solid;width:200px;color:#eeeeee"><?php echo mb_substr($row['date'],0,11,"utf-8");?></th>
                                    <th style="border:1px solid;width:100px;color:#eeeeee"><?php echo $row['hit'];?></th>
                                </tr>
                                <?php $num2--;}?>
                                </table>
                                </div>
                                <div>
                                </div>
                                <?php
                                $before = $pagination-1;
                                ?>

                            <!--리스트 번호-->
                                <div class="center">
                                <div class="pagination" style ="width:1024px; margin:0 auto; ">
                                <?php 
                                $before=$pagination-1; 
                                $after=$pagination+1; 
                                $before2=$before*5; 
                                $after2=$after*5-4;
                                if($pagination>1)
                                {
                                    echo "<a href='/Graduation_Project/bbs/board.php?pagination=$before&page=$before2'>&laquo;</a>";
                                }
                                for($i=$pagination*5-4; $i<=$pagination*5; $i++)
                                {
                                    if($i<=$totalpagenum) {
                                    echo "<a href='/Graduation_Project/bbs/board.php?pagination=$pagination&page=$i'>[$i]</a>";
                                    } else {
                                        break;
                                    }
                                }
                                if($pagination<$totalblocknum) {
                                    echo "<a href='/Graduation_Project/bbs/board.php?pagination=$after&page=$after2'>&raquo;</a>";
                                }
                                ?>
                                </div>
                                <?php if((isset($_SESSION['id']) && isset($_SESSION['nickname']))) { ?>
                                    <div style ="margin:0 auto; text-align:right">
                                    <button style='float:right; border:1px solid; background:none; color:white' onclick="location.href='/Graduation_Project/bbs/boardwrite.php?starttime=<?php echo time(); ?>'">게시글 작성하기</button>
                                </div>
                                <?php } ?>
                                </div>

                                </div>
                                
                                </div>
									</div>
									
								</div>
                                
							</div>
                            
							</div>
                            
			</section>
</center>


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

<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="사이트관리자"
  agent-id="9088c615-bae0-4925-8c63-f2c61acef3e4"
  language-code="ko"
></df-messenger>
</body>
</html>