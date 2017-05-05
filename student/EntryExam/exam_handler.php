<?php

    session_start();
    require("../../configuration/config.php");

    class Executor extends configuration{
        
        public $tblName, $ans_sql,$timing,$student,$tempID,$det;
        
        public function Andvance_Data_Entry(){
            
            $times = getdate(date("U"));//hadles the Unique Table Name
            
            $timi =  "$times[hours]$times[minutes]$times[seconds]$times[year]";//hadles the Unique Table Name
            $this->tblName = "Exam".$timi.$_SESSION['Exam'];//Unique Table Name in a Session
            
            $ids = $_SESSION['Exam'];//ExamID Session
            $this->student = $_SESSION['student'];//Student ID Session
            $this->tempID = $_SESSION['TempExamID'];//Temporary Sutdent ID Session
            
            $finder = $_SESSION['account'];
            $fsql = $this->connect->query("SELECT `Account`,`fname`,`lname` FROM `users` WHERE `Account`='$finder'");
            
            //echo "{$this->tblName}"; // was for test purposes!!
            
            $this->ans_sql = "SELECT * FROM answer WHERE ExamID=$ids";
            $this->wro = "SELECT * FROM mat WHERE TEID=$this->tempID";
             $this->det = "SELECT Student,ExamID FROM score WHERE Student=$this->student AND ExamID=$ids";
            
            $sql = "CREATE TABLE $this->tblName (
                
                MarkID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                TEID VARCHAR(255),
                ExamID INT(30),
                Student VARCHAR(255),
                Answer VARCHAR(255),
                ExAns VARCHAR(255)
            
            )";
            
            $chek = $fsql->fetch_assoc();
            $fname = $chek['fname'];
            $lname = $chek['lname'];
            
            
            
            
            $sql3 = $this->connect->query($this->ans_sql);
            $sql4 = $this->connect->query($this->wro);
           
            $data = $this->connect->query($this->det);
            
             if(1 == mysqli_num_rows($data)){
                        echo "{$fname} {$lname} Exam Was already Marked!, please click finish exam to continue.";
                        
                    }else{
            
            while($rom = $sql3->fetch_assoc() and $roms = $sql4->fetch_assoc()){
                
                $a = $rom['Answers'];
                
                $b = $roms['ExAns'];
                $sql2 = "INSERT INTO $this->tblName (ExamID, Answer,ExAns,Student,TEID) VALUES ('$ids','$a','$b','$this->student','$this->tempID')";
                $this->connect->query($sql);
                $bob = $this->connect->query($sql2);
                
                
            }
            if($bob == true){
                
                $x = "SELECT * FROM $this->tblName WHERE TEID=$this->tempID";
                
                $e = $this->connect->query($x);
         
                        while($r = $e->fetch_assoc()){
                            if($r['Answer'] == $r['ExAns']){
                                $this->connect->query("INSERT INTO look (Correct,ExamID,Student,TEID) VALUES ('O','$ids','$this->student','$this->tempID') ");
                            }else{
                                $this->connect->query("INSERT INTO look (Incorrect,ExamID,Student,TEID) VALUES ('I','$ids','$this->student','$this->tempID') ");  
                                }
                            }
                    echo "Created Successfully!!";
                header("Location: scoreCard.php");
                
            }else{
                echo "Unable to Create table";
            }
        }
        }
        
    }

if(isset($_SESSION['Exam']) && !empty($_SESSION['Exam'])  && isset($_SESSION['student']) && !empty($_SESSION['student']) && !empty($_SESSION['TempExamID']) && isset($_SESSION['TempExamID'])){
    $ok = new Executor();
$ok->Andvance_Data_Entry();
}else{
    header("Location: Start_Exam.php");
    echo "No Exa TO Mark!";
}


?>