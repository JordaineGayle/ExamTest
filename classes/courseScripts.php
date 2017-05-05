<?php
session_start();
require "../../classes/config.php";

class courseMain extends configuration {
	
	public function new_course($aim,$syllNumber,$days,$times,$identifier,$course_Title){
		// check if course already exist for the user 
		$selectQuery = $this->connect->query("SELECT `course_name` FROM `course` WHERE `account`='$identifier' ");
		
		while($rows = $selectQuery->fetch_assoc()){
			
			$course = $rows['course_name'];
			if($course == $course_Title){
				
					$courseExist = true;
					
					}	
				
			}
		
		
		
			if( isset($courseExist) && !empty($courseExist) ){
				
			return  "You have already registered for this course, please edit from the pannel on the left";	
				
				}else{
				
				$this->connect->query("INSERT INTO `course` (`account`,`course_name`,`course_time`,`course_days`,`course_aim_id`,`course_section_id`) VALUES ('$identifier','$course_Title','$times','$days','$aim','$syllNumber') ");
			
			 $this->aims($identifier,$course_Title);			
					}
			
		
		
		
		
		}
		
	public function aims($identifier,$course_Title){
		$query = $this->connect->query("SELECT `course_aim_id`,`course_name` FROM `course` WHERE `account`='$identifier' AND  `course_name`='$course_Title'");
		$result = $query->fetch_assoc();
		$aim = $result['course_aim_id'];
		$name = $result['course_name'];
		
		
		
		
				echo "<div id='editAims'><table>";
				// if no aims where created as yet
				for($x = 1; $x <= $aim; $x++){
					
					?>
                        	<tr>
                            	<td>Aim <?php echo $x;?></td>
                                <td><input type="text" name="option" id="option<?php echo $x;?>" style="width:380px"></td>
                            </tr>
                           
					<?php
					
					}
					?>
                    
					</table>
                    <a class="button" onclick="UpdateAims('<?php echo $x;?>','<?php echo $name; ?>')"> Update Course</a>

                    </div>
					<?php
				
				
		
		}
	public function sections($identifier,$course_Name){
		$query = $this->connect->query("SELECT `course_section_id`,`course_name` FROM `course` WHERE `account`='$identifier' AND  `course_Name`='$course_Name'");
		$result = $query->fetch_assoc();
		$section = $result['course_section_id'];
		$ID = $result['course_name'];
		
		
		echo "<div id='editAims'><table>";
				// if no aims where created as yet
				for($x = 1; $x <= $section; $x++){
					
					?>
                        	<tr>
                            	<td>Section <?php echo $x;?></td>
                                <td><input type="text" name="section" id="sectionOption<?php echo $x;?>" style="width:380px"></td>
                            </tr>
                           
					<?php
					
					}
					?>
                    
					</table>
                    <a class="button" onclick="UpdateSection('<?php echo $x;?>','<?php echo $ID; ?>')"> Update Course</a> 
                   </div>

					<?php
		}
		
	public function AddAims($account,$updateAim,$course_name){
		
		$query = $this->connect->query("SELECT `course_ID` FROM `course` WHERE `account`='$account' AND `course_name`='$course_name' ");
		$result = $query->fetch_assoc();
		$course_ID = $result['course_ID'];
		
		$this->connect->query("INSERT INTO `course_aim` (`account`,`aims`,`course_ID`) VALUES ('$account','$updateAim','$course_ID')");
		
		
		}
		
	public function AddSection($account,$updateSection,$course_Name){
		
		$query = $this->connect->query("SELECT `course_ID` FROM `course` WHERE `account`='$account' AND `course_name`='$course_Name' ");
		$result = $query->fetch_assoc();
		$course_ID = $result['course_ID'];
		
		$this->connect->query("INSERT INTO `course_section` (`account`,`section`,`course_ID`) VALUES ('$account','$updateSection','$course_ID')");
		
		
		}				
	}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$aim    	= test_input($_POST["aim"]);
	@$syllNumber  	= test_input($_POST["syllNumber"]);
	@$days			= test_input($_POST["daysArray"]);
	@$times			= test_input($_POST["timeArray"]);
	@$course_Title		= test_input($_POST["course_Title"]);
	// update Aims
	
	@$addAim 		= test_input($_POST["updateAims"]); 
	@$course_Name		= test_input($_POST["courseName"]);
	
	//show courses
	@$showCourse    = test_input($_POST['showSectionField']);
	
	//update sections
	@$updateSection = test_input($_POST["updateSection"]);
}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$course = new courseMain;
if(isset($aim) && !empty($aim)){
	echo $course->new_course($aim,$syllNumber,$days,$times,$_SESSION["account"],$course_Title);	
	}

if(isset($addAim) && !empty($addAim)){
	echo $course->AddAims($_SESSION["account"],$addAim,$course_Name);
	}	
if($showCourse == true){
	
	echo $course->sections($_SESSION["account"],$course_Name);
	
	}
if(isset($updateSection) && !empty($updateSection)){
	 echo $course->AddSection($_SESSION["account"],$updateSection,$course_Name);
	}			

