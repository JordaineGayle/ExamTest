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
	
	// pull available courses from the database
	public function courses() {
		$query = $this->connect->query("SELECT * FROM `course`");
		
		while($result = $query->fetch_assoc()){
			
			?>
				
					<div class="dottedboxes" onclick="selectSubject('<?php echo $result['course_ID']?>')"><?php echo $result['course_name'];?></div>
					
				
			<?php
		}
		
		
		}
	
	public function checkPayment($ID) {
		// check if sign up payment was made

		$query = $this->connect->query("SELECT `item_name` FROM `payments` WHERE `Account`='$ID' ");
		
		while($result = $query->fetch_assoc()){
			
			if($result['item_name'] == "registration"){

			return	$results = true;
			}else{
			return	$results = false;
			}	
		}
		
		
	}
	
	}
	
