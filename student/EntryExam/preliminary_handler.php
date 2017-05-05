<?php 

    session_start();
 $_SESSION['cout'] = 1 ;
    require("../../configuration/config.php");


    class PreliminaryData extends configuration{
        
        public $session,$exm_title,$duration,$description,$subject,$ExamID,$sub_sql,$pre_sql,$coach;
        
        public function Setter(){
            
            $this->exam_title = $_POST['examTitle'];
            $this->duration = $_POST['duration'];
            $this->description = $_POST['description'];
            $this->subject = $_POST['subject'];
            $this->coach = $_POST['coach'];
            
            
            if(!empty($this->exam_title) && !empty($this->duration) && !empty($this->subject) && !empty($this->coach)){
                
                
                $queri = $this->connect->query("SELECT `ExamID`,`Exam_Title` FROM `pre_data` WHERE `Exam_Title`='$this->exam_title' ");
		          $check = $queri->fetch_assoc();
                
                if($check['Exam_Title'] == $this->exam_title){
                    
                    echo "Exam Title Already Exist!";
                    
                }else{
                
            
            $this->pre_sql = "INSERT INTO pre_data (Exam_Title,Duration,Description,CoachID) VALUES ('$this->exam_title','$this->duration','$this->description','$this->coach')";
            
            $this->connect->query($this->pre_sql);
            
               
            
            $sql = "SELECT * FROM pre_data WHERE ExamID=ExamID";
            $data = $this->connect->query($sql);
            
            while($results = $data->fetch_assoc()){
                $_SESSION['ExamID'] = $results['ExamID'];
            
                $this->session = $_SESSION['ExamID'];
            }
            
            
            
            $this->sub_sql = "INSERT INTO subjects (Subject,ExamID,Instructor) VALUES ('$this->subject','$this->session','$this->coach')";
            
            $this->connect->query($this->sub_sql);
            
            echo $this->session;
                    
           
                
                  
           
          }
            }else{
                echo"Please input data";
            }

        }
        
}

$caller = new PreliminaryData();
$caller->Setter();
if(isset($_SESSION['ExamID'])){
    
    header("Location: Questions.php");
}else{
   header("Location: Preliminary_Data.php");
}


?>