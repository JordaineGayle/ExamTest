<?php
session_start(); 
$account = $_SESSION["account"];

require "config.php";
include "assignment_handler.php";
include "quiz_handler.php";

// collect data from main website
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$action    	= test_input($_POST["action"]);
	@$classid    	= test_input($_POST["classID"]);
	@$handle    	= test_input($_POST["handle"]);
	
	//assignment 
	@$assignmentID		= test_input($_POST["assignmentID"]);
	@$assignmentTitle    = test_input($_POST["assignment"]);
	@$assigndetail  = test_input($_POST["detail"]);
    
    // quiz requirements 
    
    @$quizTitle   = test_input($_POST["testTitle"]);
    @$quizTime    = test_input($_POST["testTime"]);
    @$quizPhase   = test_input($_POST["phase"]);
    @$quizquest    = test_input($_POST["question"]);
    @$option1  = test_input($_POST["option1"]);
	@$option2  = test_input($_POST["option2"]);
    @$option3  = test_input($_POST["option3"]);
    @$option4  = test_input($_POST["option4"]);
    @$quizID   = test_input($_POST["quizID"]);

}

//escape function
function test_input($data)
{   $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}	
	

switch ($handle){
	case 'assignment':
	$assignment = new assignments;
		
		if($action == "delete"){
			$assignment->DeleteAssignment($assignmentID,$classid);
			}
		if($action == "edit"){
			$assignment->EditFormAssignment($classid,$assignmentID);
			}
		if($action == "editUpdate"){
			$assignment->EditAssignment($assignmentTitle,$assigndetail,$classid,$assignmentID);
			}	
		if($action == "new"){
			
			$assignment->NewAssignment($assignmentTitle,$assigndetail,$classid,$assignmentID);
			}	
		if($action == "add"){
			$assignment->AddAssignment($classid);
			}		
	break;
	
	case "addQuiz": 
        
        $quiz = new quiz;
        
        if($quizPhase == "phaseOne"){
           $quiz->newQuiz($quizTitle,$quizTime,$classid);
           echo "<a class='btn' href='classroomData.php?id=$classid'>Back to class</a>";
        }
        
        if($quizPhase == "phaseTwo"){
            $quiz->questions($quizquest,$option1,$option2,$option3,$option4,$_SESSION["quiz"]);
             
        }   
		
	break;
	
	case "quiz":
		
		$quiz = new quiz;
		$quiz->removeQuiz($quizID);
		echo $quizID;
		
	break;	
	default:
	}	