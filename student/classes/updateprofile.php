<?php 
session_start();
require "../../classes/config.php";

class update extends configuration {
	
	public function update_name($fname,$lname,$account) {
		
		 $this->connect->query("UPDATE `users` SET `fname`='$fname',`lname`='$lname' WHERE `Account`='$account' ");
		
		echo "<h2>".$fname." ".$lname."</h2>";
		}
		
	public function update_profiledata($fname,$lname,$street,$city,$country,$phone,$account) {
		 
		 $this->connect->query("UPDATE `users` SET `fname`='$fname',`lname`='$lname',`address_1`='$street',`city`='$city',`country`='$country' WHERE `Account`='$account' ");
		 echo "Thank you for updating your profile";
		}	
	}
	

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$fname    = test_input($_POST["fname"]);
	@$lname	  = test_input($_POST["lname"]);
	@$street	  = test_input($_POST["street"]);
	@$city	  = test_input($_POST["city"]);
	@$country	  = test_input($_POST["country"]);
	@$phone	  = test_input($_POST["phone"]);

}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$update = new update;

if(!empty($fname) && isset($fname)){
	echo $update->update_name($fname,$lname,$_SESSION["account"]);	
	}
if(!empty($street) && isset($street)){
	echo $update->update_profiledata($fname,$lname,$street,$city,$country,$phone,$_SESSION["account"]);
	}