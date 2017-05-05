<?php

session_start();
 class quiz extends configuration {
  
     public function removeQuiz($quizID){
      $this->connect->query("DELETE FROM `quiz` WHERE `quizID`='$quizID' ");
      $this->connect->query("DELETE FROM `quiz_question` WHERE `quizID`='$quizID' ");
      
     }
     
     public function newQuiz($quizTitle,$quizTime,$classid) {
         
         $quizTime = $quizTime * 60;
         
         // create unique charactor 
         $timeNow = time();
         
         $this->connect->query("INSERT INTO `quiz` (`quizID`,`class_ID`,`quiz_title`,`quiz_time`) VALUES ('$timeNow','$classid','$quizTitle','$quizTime')");
         $_SESSION["quiz"] = $timeNow;
         
     }
     
    public function questions($quizquest,$option1,$option2,$option3,$option4,$QuizIdentifier) {
         
         $this->connect->query("INSERT INTO `quiz_question` (`quizID`,`question_title`,`option_1`,`option_2`,`option_3`,`option_4`) VALUES ('$QuizIdentifier','$quizquest','$option1','$option2','$option3','$option4')");
         
         
         
    }
     
    
 }