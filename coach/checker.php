<?php


    require("../configuration/config.php");


class check extends configuration{
    
    public function checkingDb(){
        
        $ExamID = $_POST['check'];

            $queri = $this->connect->query("SELECT `ExamID` FROM `pre_data` WHERE `ExamID`='$ExamID' ");
		      //$check = $query->fetch_assoc();
                
                if(1 == mysqli_num_rows($queri)){
                    echo "Exam Exist!";
                    echo "<script>
                    
                    
                    $('#examID').css('background-color','#cefdce');
                    $('#feedback').html('<img src=\"available.png\"/>');
                    
                    </script>";
                    
                }else{
                    echo "<script>
                    
                    
                    $('#examID').css('background-color','#ffe5e5');
                    $('#feedback').html('<img src=\"not-available.png\"/>');
                    
                    </script>";
            echo "Exam Doesn't Exist!";
                  }
        
    }
    
}

$ok = new check();

$ok->checkingDb();


?>