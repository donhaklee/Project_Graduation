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
<?php header("Content-Type: text/html; charset=UTF-8");
$conn = new mysqli("localhost", "root", "6570", "web");
mysqli_query ($conn, 'SET NAMES utf8');
$boardnum=$_GET['boardnum'];
$sql = "select *from board where boardnum='$boardnum'";
$res = $conn->query($sql);
$row=mysqli_fetch_array($res);
?>


<section  class="row tm-section">
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <div class="col-12">
            <div class="w-100 tm-double-border-1 tm-border-gray">
                <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                    <div  style="text-align:left;"><a href="board.php"><b>게시판</a><br></div>
                    <h2 style="text-align:center; color:#B0C4DE"><b>게시글 수정</h2>
                    <div class="tm-gallery-wrap">

                                <center>
                                    <textarea style="width:724px; margin:0 auto;" id="title"><?php echo $row['boardtitle']; ?></textarea> 
                                </center>
                                <div style="border:1px solid; height:400px; overflow:auto;width:724px; margin:0 auto;text-align:left; color:white " id="editor" contentEditable="true"><?php echo str_replace('＆','&',$row['boardcontents']); ?></div>

                                <div id="demo"></div>
                                <form style="width:724px; margin:0 auto; text-align:left" action="upload.php" method="post" enctype="multipart/form-data" target="test">
                                    <input type="file" name="file[]" multiple="multiple" onchange="this.form.submit()">
                                    <input type="hidden" name="nickname" value="<?php echo $_SESSION['nickname']; ?>">
                                    <input  type="hidden" name="time" value="<?php echo $row['starttime']; ?>">
                                </form>
                                <center>
                                    <iframe style="width:724px; margin:0 auto; src="/Graduation_Project/bbs/delete.php?time=<?php echo $row['starttime'];?>" name="test"></iframe>
                                </center>
                                <center>
                                <button style=' border:1px solid; background:none; color:white' onclick="apply()">게시글 수정</button>
                                    </center>

    

                            </div>
                    
                    </div>
                </div>
                </div>
        </section>
    </center>
<script>
function apply() {
    var x1 = document.getElementById("title").value.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝")
        .replace(/\\/g,"＼");
    var x2 = document.getElementById("editor").innerHTML.replace("+","＋").replace(/#/g,"＃").replace(/&/g,"＆").replace(/=/g,"＝")
        .replace(/\\/g,"＼");
    var obj, dbParam, xmlhttp, myObj, x;
    obj={"table":"board","boardtitle":x1,"boardcontents":x2,"boardnum":"<?php echo $boardnum; ?>"};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
                for (x in myObj) {
                if(myObj[x] == '1') {
                location.href='board.php';
                return false;
                } else {
                document.getElementById("demo").innerHTML = "업로드 실패!";
                }
            }
        }
    };
    if((x2.trim() == "<br>")||(x2.trim()=="")||(x1.trim() == "")) {
        alert("입력된 텍스트가 없습니다.");
        return false;
        } else {
        document.getElementById("editor").innerHTML = "";
        xmlhttp.open("POST","/Graduation_Project/bbs/boardupdateapply.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam); 
        alert('수정되었습니다');
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