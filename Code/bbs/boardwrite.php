<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="slick/slick.css" />
    <link rel="stylesheet" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/templatemo-dream-pulse.css" />
<link rel="stylesheet" href="css/board.css" />
</head>
<body>
    


<center>
<section  class="row tm-section" >
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <div class="col-12">
            <div class="w-100 tm-double-border-1 tm-border-gray">
                <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                <div style="text-align:left;"><b>
                <?php 
                header("Content-Type: text/html; charset=UTF-8");
                session_start();?>
                <?php if((!isset($_SESSION['id'])) && (!isset($_SESSION['nickname']))) {?>
                    <a href="/Graduation_Project/bbs/join.html">회원가입</a><br>
                    <a href="/Graduation_Project/bbs/login.html">로그인</a><br>
                <?php } else {?>
                    <a href="/Graduation_Project/bbs/logout.php">로그아웃</a><br>
                <?php }?>
                </div>
                    <div  style="text-align:left;"><a href="board.php"><b>게시판</a><br></div>
                    <h2 style="text-align:center; color:#B0C4DE"><b>게시글 작성</h2>
                    <div class="tm-gallery-wrap">

<center>
    <textarea id="title"style="width:724px; "></textarea>
    <div style="border:1px solid; height:400px; overflow:auto; width:724px;text-align:left; color:white " id="editor" contentEditable="true"></div>
    <div id="demo"></div>
</center>
    <form style="width:724px; margin:0 auto; text-align:left" action="upload.php" method="post" enctype="multipart/form-data" target="test">
    <input type="file" name="file[]" multiple="multiple" onchange="this.form.submit()">
    <input type="hidden" name="nickname" value="<?php echo $_SESSION['nickname']; ?>">
    <input type="hidden" name="time" value="<?php echo $_GET['starttime']; ?>">
    </form>
 <center>
    <iframe name="test" style="width:724px; "></iframe><br>
    <button style="border:1px solid; background:none; color:white;text-align:center"  onclick="apply()"> 게시글 등록</button>
</center>
    </div>
									
                                    </div>
                                </div>
                                </div>
                        </section>
    
    </center>
    
    
    <script>
        function apply() { 
            var x1 = document.getElementById("title").value.replace(/\+/,"＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝")
            .replace(/\\/g,"＼");
            var x2 = document.getElementById("editor").innerHTML.replace(/\+/,"＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝")
            .replace(/\\/g,"＼");
            var x3 = new Date();
            var x4 = <?php echo $_GET['starttime'];?>;
            var days = ["일요일 ","월요일 ","화요일 ","수요일 ","목요일 ","금요일 ","토요일"];
            var time;
	  
            time = x3.getFullYear()+"."+(x3.getMonth()+1)+"."+x3.getDate()+" "
            +days[x3.getDay()]
            +x3.getHours()+":"+x3.getMinutes()+"  ";
            
            var obj, dbParam, xmlhttp, myObj, x; 
            obj={"table":"board","boardtitle":x1,"boardcontents":x2,"nickname":"<?php echo $_SESSION['nickname']?>",
"date":time,"starttime":x4};            
            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myObj = JSON.parse(this.responseText);
                    for (x in myObj) { 
                        if(myObj[x] == '1') {
                            location.href='/Graduation_Project/bbs/board.php';
                            return false;
                        } else {
                            document.getElementById("demo").innerHTML = "업로드를 실패했습니다";
                        }
                    } 
                }
                };
            if ((x1.trim() == "")||(x2.trim() == "<br>")||(x2.trim() == "")) { 
                alert("입력된 텍스트가 없습니다."); 
                return false;
            } else { 
                document.getElementById("editor").innerHTML = "";
                xmlhttp.open("POST", "/Graduation_Project/bbs/boardapply.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("x=" + dbParam); 
                alert('작성에 성공했습니다');
            }
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