<?php
session_start(); 
$account = $_SESSION["account"];
include "assignment_handler.php";
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
	
	case "ReceiveAssignmentForm": 
		
		
		
	break;
	default:
	}	