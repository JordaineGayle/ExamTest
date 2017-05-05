<?php

require "config.php";

class verify extends configuration {
	
	public function verified($id,$type){
		$query = $this->connect->query("UPDATE `users` SET `terms`='1' WHERE `Account`='$id' ");
		
		if($type == "student"){
			header("Location:../student/");
			}
			
		if($type == "coach"){
			header("Location:../coach/");
			}	
		
		
		}
	
	}
$id = $_GET['id'];	
$type = $_GET['type'];
$verify = new verify;
echo $verify->verified($id,$type);