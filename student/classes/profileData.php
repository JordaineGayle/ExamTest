<?php 

class data extends configuration {
	public $name;
	
	public function headerInformation($account){
		$query = $this->connect->query("SELECT `fname`,`lname` FROM `users` WHERE `Account`='$account' ");
		$result = $query->fetch_assoc();
		$this->name = $result['fname']." ".$result['lname'];
		}
		
	public function nameform(){
		
		 ?>
         <br><br>
          <p>Hello, what is your name? </p>
			<input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name">
            <a class="loginButton" onClick="SaveName()">Save</a>
		<?php
		
		}	
	}
	
