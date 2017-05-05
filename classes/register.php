<?php
session_start();
require "config.php";

class register extends configuration {
    
    public function getRegisterStudent($user,$p1,$p2,$terms) {
        
		
			
		//check if user already exist	
		$query = $this->connect->query("SELECT `Account`,`email` FROM `users` WHERE `email`='$user' ");
		$check = $query->fetch_assoc();
		
		if($check['email'] == $user){
			$error = "emailExist";
			}
		
		//encypt password 
		$hash = password_hash($p1,PASSWORD_BCRYPT);	
		
		//timestamp
		$timestamp = time();
		
		//check if there are any errors 
		if(!empty($error)){
			
			header("Location:../register.php?type=student&error=".$error);
			
			}else{
			
			if($terms == "accept"){
				//create account
		$query = $this->connect->query("INSERT INTO `users` (`timestamp`,`email`,`password`,`type`) VALUE ('$timestamp','$user','$hash','student') ");
		
		$accountQuery = $this->connect->query("SELECT `Account` FROM `users` WHERE `email`='$user' ");
		$accountSession = $accountQuery->fetch_assoc();
		
		//create session 
		$_SESSION["account"] = $accountSession["Account"];

		header("Location:../select.php?type=student");
			}else{
				header("Location:../register.php?type=student&error=terms");
			}
				
				}
			 
			
			
            
    }
    
    public function getRegisterCoach($user,$p1,$p2,$terms) {
		
        //check if user agrees to terms 
		if(!isset($terms)){
			$error = "noaccept";
			}
			
		//check if user already exist	
		$query = $this->connect->query("SELECT `Account`,`email` FROM `users` WHERE `email`='$user' ");
		$check = $query->fetch_assoc();
		
		if($check['email'] == $user){
			$error = "emailExist";
			}
		
		//check if password match 
		if($p1 !== $p2)
			{
				$error = "No Match";
				}
		
		//encypt password 
		$hash = password_hash($p1,PASSWORD_BCRYPT);	
		
		//timestamp
		$timestamp = time();
		
		//check if there are any errors 
		if(!empty($error)){
			
			header("Location:../register.php?type=coach&error=".$error);
			
			}else{
			
			//create account
		$query = $this->connect->query("INSERT INTO `users` (`timestamp`,`email`,`password`,`type`) VALUE ('$timestamp','$user','$hash','coach') ");
		
		$accountQuery = $this->connect->query("SELECT `Account` FROM `users` WHERE `email`='$user' ");
		$accountSession = $accountQuery->fetch_assoc();
		
		//create session 
		$_SESSION["account"] = $accountSession["Account"];
		
		header("Location:../select.php?type=coach");
				
				}
		
    }
    
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$user    = test_input($_POST["username"]);
    @$p1      = test_input($_POST["password1"]);
    @$p2      = test_input($_POST["password2"]);
    @$terms   = test_input($_POST["termscheck"]);
    @$selection = test_input($_POST["selection"]);
}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$reg = new register;

switch ($selection) {
    case 'student':
        echo $reg->getRegisterStudent($user,$p1,$p2,$terms);
        break;
    
    case 'coach':
        echo $reg->getRegisterCoach($user,$p1,$p2,$terms);
        break;
        
    default:
        echo "no type was selected, there was an issue here";
        break;
}

