<?php
    session_start();

    require("../configuration/config.php");
    class Quest_data extends configuration{
        public $quest, $id,$ans,$op1,$op2,$op3,$op4,$q_ses,$counter;
        
        
        public function data(){
            $this->quest = $_POST['Questions'];
            $this->id = $_SESSION['ExamID'];
            $this->ans = $_POST['ans'];
            $this->op1  = $_POST['op1'];
            $this->op2  = $_POST['op2'];
            $this->op3  = $_POST['op3'];
            $this->op4  = $_POST['op4'];
            
            if(isset($this->id) && !empty($this->quest) && !empty($this->ans) && !empty($this->op1) && !empty($this->op2) && !empty($this->op3) && !empty($this->op4)){
                
                $sqql = "SELECT * FROM questions WHERE ExamID=$this->id";
            
            $runq = $this->connect->query($sqql);
            
            
            while($datas = $runq->fetch_assoc()){
                $this->counter++;
            }
            
            $_SESSION['cout'] = $this->counter;
            
                if($this->counter > 24 ){
        session_unset($_SESSION["ExamID"],$_SESSION['cout']); 
        session_destroy(); 
        echo"You already Set enough Questions!";
    }else{
                
                $sql = "INSERT INTO questions (Questions,ExamID) VALUES ('$this->quest','$this->id')";
                
                $raw = $this->connect->query($sql);
                
                $sqlw = "SELECT * FROM questions WHERE QuestID=QuestID";
            $data = $this->connect->query($sqlw);
                
                
            
            
            while($results = $data->fetch_assoc()){
                $_SESSION['QuestID'] = $results['QuestID'];
            
                $this->q_ses = $_SESSION['QuestID'];
            }
                
                $sqlo = "INSERT INTO options (Option1,Option2,Option3,Option4,ExamID,QuestID) VALUES ('$this->op1','$this->op2','$this->op3','$this->op4','$this->id','$this->q_ses')";
                $sqla = "INSERT INTO answer (Answers,ExamID,QuestID) VALUES ('$this->ans','$this->id','$this->q_ses')";
                
                $raw1 = $this->connect->query($sqlo);
                $raw2 = $this->connect->query($sqla);
                
                if($raw == true && $raw1 == true && $raw2 == true){
                    echo "Added Successfully!";
                }else{
                    echo "Error Inserting !";
                }
            }
            }else{
                echo "Please input data";
            }
            
            
        }
    }

if(isset($_SESSION['ExamID'])){
    $ok = new Quest_data();

$ok->data();
}else{
    header("Location: Preliminary_Data.php");
}

?>