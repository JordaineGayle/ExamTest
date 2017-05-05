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
		
	public function showcurrentCourses($account){
		 $query = $this->connect->query("SELECT * FROM `course` WHERE `account`='$account' ");
	   
	   
	   while($result = $query->fetch_assoc()){
	    
	    ?>
	         <div class="addSomething" onclick="load_course('<?php echo $result['course_name'];?>')">
              	<a><?php echo $result['course_name'];?></a>
            
              </div>
	    <?php
	       
	   }
	}	
	public function currentCourses($identifier) {
		// check database for any courses 
		$courseQuery = $this->connect->query("SELECT `course_name` FROM `course` WHERE `account`='$identifier' ");
				
		while($course = $courseQuery->fetch_assoc()){
			
		?>
			<li onclick="load_course('<?php echo $course['course_name'];?>')"><?php echo $course['course_name'];?></li>
            
		<?php	
			
			}
		
		
		}
		
	public function transcript(){
		
	}
}
	
