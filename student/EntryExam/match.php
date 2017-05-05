<?php 

session_start();

if(isset($_SESSION['account']) && !empty($_SESSION['account'])){
    header('Location: Start_Exam.php');
}else{
    header('Location: /simms/login.html');
}


?>