<?php
session_start();
session_unset($_SESSION["Exam"],$_SESSION['TempExamID'],$_SESSION["student"],$_SESSION['questNum']); 
session_destroy(); 
header('Location: Start_Exam.php');
?>