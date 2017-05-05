<?php
session_start();
    // remove all session variables
session_unset($_SESSION["ExamID"],$_SESSION["student"],$_SESSION["Exam"],$_SESSION["QuestID"],$_SESSION['TempExamID'],$_SESSION['questNum'],$_SESSION['cout']); 

// destroy the session 
session_destroy(); 


//redirect to homepage
header('Location:Preliminary_Data.php');


?>