<?php
session_start();
require "../../classes/config.php";

class control extends configuration {
	
	public function show_course($account,$course) {
		$showQuery = $this->connect->query("SELECT * FROM `course` WHERE `account`='$account' AND `course_name`='$course' ");
		$showResults = $showQuery->fetch_assoc();
		$courseID = $showResults['course_ID'];
		$courseImage = $showResults['image'];
		
		$_SESSION['courseID'] = $courseID;
		
		
		// change comma separated value in data value 
		
		?>
        <ul class="controlPanel">
        	<li onClick="controlSet('days')">Update Support Days</li>
            <li onClick="controlSet('image','<?php echo $courseID;?>')">Course Display Image</li> <!--change times to image-->
            <li onClick="controlSet('aims','<?php echo $courseID;?>')">Update Aims</li>
            <li onClick="controlSet('sections','<?php echo $courseID;?>')">Update Sections</li>
            <li onClick="controlSet('overview','<?php echo $courseID;?>')">Update Overview</li>
        </ul>
        <script>
		
        // course control structions 
function controlSet(unitControl,Identifier){

	switch(unitControl){
		 case "overview":
		 	$.post('classes/controlsetext.php',{unitControlID:Identifier},function(data){
				$("#courseUpdates").html(data);
				
					});
					
		 break;
		 case "sections":
		
		 	$.post('classes/controlsetext.php',{SectionControlID:Identifier},function(data){
				$("#courseUpdates").html(data);
				
					});
		 break;
		 case "image":
			$.post('classes/controlsetext.php',{unitControl:Identifier},function(data) {
				$("#courseUpdates").html(data);
			});
		 break;
		 
		 default:
		 
		 
		}
	
	
	} 	
	
        </script>
        <hr>
        <div id="courseUpdates">
			<h1><?php echo $showResults['course_name'];?> <span style="font-size:14px">ID: <?php echo $showResults['course_ID'];?></span> </h1><br><br>
			
			<?php 
				if(isset($courseImage) && !empty($courseImage)){
					echo "<a style='background-position:center;background-image:url($courseImage);width:450px;height:400px;float:left'></a>";
				}else{
					echo "<a style='background-position:center;background-image:url(assets/placeholder.png);width:450px;height:400px;float:left'></a>";
				}
			?>
			
			
            	
                
            <div style="text-align:left;padding:15px;float:left">
            	Support Aims:
                <ul class="supportList">
                	<?php echo $this->showAim($courseID);?>
                    <li></li>
                </ul>
            </div>
            
			<div style="clear:both"></div>
			
            <div>
            	Support Sections:
                <ul class="supportList">
                	<?php echo $this->showSection($courseID);?>
                    <li></li>
                </ul>
            </div>
           </div> 
           
           <div style="height:10px; clear:both"></div>
		<?php
		}
		
	private function showAim($courseID){
		$courseAim = $this->connect->query("SELECT * FROM `course_aim` WHERE `course_ID`='$courseID'");
		while($courseAimResults = $courseAim->fetch_assoc()){
			?>
				<li><?php echo $courseAimResults['aims']?></li>
			<?php
			}
		}
	private function showSection($courseID){
		$courseSection = $this->connect->query("SELECT * FROM `course_section` WHERE `course_ID`='$courseID'");
		while($courseSectionResults = $courseSection->fetch_assoc()){
			?>
				<li><?php echo $courseSectionResults['section']?></li>
			<?php
			}
		}
		
	public function form_course_section($account,$fromID) {
		$query = $this->connect->query("SELECT `section_position` FROM `course_section` WHERE `course_ID`='$fromID' ORDER BY `section_position` ASC");
		
		while($result = $query->fetch_assoc()){
			$indexArray = $result['section_position'];
			}
			$indexArray++;
		
		?>
			<input type="text" id="setSection">
            <input type="hidden" id="sectionPosition" value="<?php echo $indexArray;?>">
            <a class="button" onclick="UpdateSectionAdditional('<?php echo $fromID;?>')">Add Section</a>
		<?php
		
		}			
	}
	
	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$course    	= test_input($_POST["course"]);
	@$courseForm    	= test_input($_POST["courseForm"]);

}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$control = new control;

if(isset($course) && !empty($course)){
	echo $control->show_course($_SESSION['account'],$course);
	}

if(isset($courseForm) && !empty($courseForm)){
	echo $control->form_course_section($_SESSION['account'],$courseForm);
	}