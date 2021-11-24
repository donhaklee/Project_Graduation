<?php
if(isset($_GET['filepath'])){ 
    $file = $_GET['filepath'];  
} else { 
    exit(); 
}
if(isset($_GET['filename'])){ 
    $filename = urlencode($_GET['filename']);
} else {
    echo "<script>location.href='/board.php';</script>";
    exit();
}
$size = filesize($file); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: binary");
header("Content-Length: $size");
header("Content-Disposition: attachment; filename=".$filename);

ob_clean();
flush();
readfile($file);
?>