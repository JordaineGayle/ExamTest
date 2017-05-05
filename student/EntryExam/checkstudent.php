<?php


    require("../../configuration/config.php");


class check extends configuration{
    
    public function checkingDb(){
        
        $StudentID = $_POST['studentID'];
        $ExamID = $_POST['check'];

            $queri = $this->connect->query("SELECT `ExamID`,`Student` FROM `students` WHERE `ExamID`='$ExamID' AND `Student`='$StudentID' ");
		      //$check = $query->fetch_assoc();
                
                if(1 == mysqli_num_rows($queri)){
                    
                    echo "<script>
                    
                    
                    $('#student').css('background-color','#ffe5e5');
                    $('#feedbacks').html('<img src=\"img/not-available.png\"/>');
                    
                    </script>";
            echo "Exam Doesn't Exist!";
                    
                }else{
                    echo "Exam Exist!";
                    echo "<script>
                    
                    
                    $('#student').css('background-color','#cefdce');
                    $('#feedbacks').html('<img src=\"img/available.png\"/>');
                    
                    </script>";
                    
                  }
        
    }
    
}

$ok = new check();

$ok->checkingDb();


?>