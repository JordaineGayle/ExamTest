<?php 

class payment extends configuration {
    public $student,$account;
    
    public function checkPayment($tx,$student,$account){
        $this->student = $student;
        $this->account = $account;
        $query = $this->connect->query("SELECT `tx` FROM `payments` WHERE `tx`='$tx' ");
        $result = $query->fetch_assoc();
        if(isset($result['tx']) && !empty($result['tx'])){
            $this->setPaymentRegister($tx,$student,$account);
        }else{
            echo "Thank you for registering, please stay on this page for 3 minutes while we update your account.<br>br>";
            sleep(4);
            $this->secondCheck($tx);
        }
    }

    public function setPaymentRegister($tx,$subject,$ID){
        if(!empty($subject)){
             $this->connect->query("UPDATE `payments` SET `Account`='$ID',`course_ID`='$subject' WHERE `tx`='$tx'");     
        }
       
    }
    
    public function secondCheck($tx){
        $query = $this->connect->query("SELECT `tx` FROM `payments` WHERE `tx`='$tx' ");
        $result = $query->fetch_assoc();
        if(isset($result['tx']) && !empty($result['tx'])){
            $this->setPaymentRegister($tx,$this->student,$this->account);
        }else{
            echo "Thank you for registering, please stay on this page for 3 minutes while we update your account.<br>br>";
            sleep(4);
            $this->checkPayment($tx,$this->student,$this->account);
        }
        
    }

}