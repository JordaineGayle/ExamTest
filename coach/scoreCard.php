<?php

    session_start();
    require("../configuration/config.php");

    class Score extends configuration{
        
        public $total,$correct,$percent,$id,$det;
        
        
        public function Calculus(){
            
            $this->total = 0;
            $this->correct = 0;
            $this->id = $_SESSION['Exam'];
            $sid = $_SESSION['student'];
            $tempID = $_SESSION['TempExamID'];
            //$this->total = 0;
            
            $sql = "SELECT * FROM look WHERE TEID=$tempID";
            
            $run = $this->connect->query($sql);
            
            $this->det = "SELECT Student,ExamID FROM score WHERE Student=$sid AND ExamID=$this->id";
            $data = $this->connect->query($this->det);
            if(1 == mysqli_num_rows($data)){
                echo "Exam Was already Marked!";
            }
            else{
            
            while($i = $run->fetch_assoc()){
                $this->total++;
                if($i['Correct']){
                    $this->correct++;
                }
            }
            
            $this->percent = ($this->correct/25) * 100;
            
            
            echo "You got {$this->correct} / 25 <br/> Your Pecentage is ".round($this->percent)."%.";
            if($this->percent < 80){
                echo "<br/>"."You Failed the Entry Exam!";
                if($this->total < 25){
                    echo "<br/>"."You answered {$this->total} questions and only {$this->correct} where correct!!";
                }
                  $sql1 = "INSERT INTO score (TEID,Student,Percentage,Failed,ExamID) VALUES ('$tempID','$sid','$this->percent','Yes','$this->id')";
            if($this->connect->query($sql1)){
                echo "<br/>"."Added Successfully!!";
            }else{
                echo "<br/>"."Failed adding score to DB!!";
            }
            }else{
                echo "You Passed Congratulation!"."<br/>";
                if($this->total < 25){
                    echo "<br/>"."You answered {$this->total} questions and only {$this->correct} where correct!!";
                }
                  $sql = "INSERT INTO score (TEID,Student,Percentage,Passed,ExamID) VALUES ('$tempID','$sid','$this->percent','Yes','$this->id')";
            if($this->connect->query($sql)){
                echo "<br/>"."Added Successfully!!";
            }else{
                echo "<br/>"."Failed adding score to DB!!";
            }
            }
            }
            
        }
    }
if(isset($_SESSION['Exam']) && !empty($_SESSION['Exam'])  && isset($_SESSION['student']) && !empty($_SESSION['student']) && !empty($_SESSION['TempExamID']) && isset($_SESSION['TempExamID'])){
   $lol = new Score();

$lol->Calculus(); 
}


?>