<?php
    session_start();
    $session = session_destroy();
    if($session){
        header("Location: /Graduation_Project/bbs/board.php");
        echo "<script>location.href='/Graduation_Project/bbs/board.php';</script>";
    }

?>