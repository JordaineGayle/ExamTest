<?php

    session_start();

    require("../../configuration/config.php");

    
    class Updater extends configuration{
        
        public $coachID,$exam,$session,$counter;
        
        public function checkOut(){
            $this->exam = $_POST['exam'];
            
            if(!empty($this->exam)){
                
                $rt = "SELECT ExamID FROM pre_data WHERE ExamID=$this->exam";
                
                $data = $this->connect->query($rt);
                
                if(1 == mysqli_num_rows($data)){
                    $_SESSION['ExamID'] = $this->exam;
            
            $this->session = $_SESSION['ExamID'];
            
            $this->counter = 0;
            
            $sql = "SELECT * FROM questions WHERE ExamID=$this->session";
            
            $runq = $this->connect->query($sql);
            
            
            while($data = $runq->fetch_assoc()){
                $this->counter++;
            }
            
            $_SESSION['cout'] = $this->counter;
            
            
            $var = $_SESSION['cout'];
            
            echo "{$var}";
            
            echo "<script> $('document').ready(function(){\$('#cont').fadeIn(1000)}); </script>";
            
                }else{
                    echo "You cant Update an Exam That doesn't Exist, Please go hit the back Button!";
                }
                
            
        }else{
                echo "Please Input values";
            }
        
            }
    }

$ok = new Updater();

$ok->checkOut();
?>