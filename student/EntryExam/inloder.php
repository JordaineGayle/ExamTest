<?php
session_start();
$_SESSION['questNum']++;
    require("../../configuration/config.php");

class TheForbiddenCodes extends configuration{
    
    public $ans_sql;
    
    public function Forbidden(){
        $var = $_POST['idms'];
        $quest = $_POST['quest'];
    $ids = $_SESSION['Exam'];
    $sid = $_SESSION['student'];
    $tempID = $_SESSION['TempExamID'];
    $num = $_SESSION['questNum'];
        
        $check_quest = "SELECT ExamID,Student,QuestID FROM mat WHERE ExamID=$ids AND Student=$sid AND QuestID=$quest";
        
        $data = $this->connect->query($check_quest);
        
        if(1 == mysqli_num_rows($data)){
            echo "Sorry You Answered Question {$num} Already!!";
        }else{
            $sql2 = "INSERT INTO mat (ExamID,ExAns,Student,TEID,QuestID) VALUES ('$ids','$var','$sid','$tempID','$quest')";
                
                $bob = $this->connect->query($sql2);
                
            if($bob== true){
                echo "Marked!!";
            }else{
                echo "Error Marking!";
            }
        }
            
               
    }
    
}


if(isset($_SESSION['Exam']) && !empty($_SESSION['Exam'])  && isset($_SESSION['student']) && !empty($_SESSION['student']) && !empty($_SESSION['TempExamID']) && isset($_SESSION['TempExamID'])){
    
   $oks = new TheForbiddenCodes();

$oks->Forbidden();
}else{
    header("Location: Start_Exam.php");
    echo "No Exa TO Mark!";
}

?>