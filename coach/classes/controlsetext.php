<?php

session_start();
require "../../classes/config.php";

class controlSet extends configuration {
	// show control set
	public function Overview($unitControlID){
		$query = $this->connect->query("SELECT `course_description`,`course_ID` FROM `course` WHERE `course_ID`='$unitControlID'");
		$result = $query->fetch_assoc();
		
		if(isset($result['course_description']) && !empty($result['course_description'])){
			
			?>
				<br><br><h2>Please add a course Description for this course</h2><br><br>
                <textarea id="editor1" name="editor1"><?php echo $result['course_description'];?></textarea><br><br>
                <a class="button" onClick="UpdateOverview('<?php echo $result['course_ID'];?>')">Update</a>
				
        
		<script type="text/javascript">	
	
		CKEDITOR.replace( 'editor1' );
		
		</script>
			<?php
			
			}else{
				?><br>
				<br><br><h2>Please add a course Description for this course</h2><br><br>
                <textarea id="editor1" name="editor1"></textarea><br><br>
                <a class="button" onClick="UpdateOverview('<?php echo $result['course_ID'];?>')">Update</a>
				
        
		<script type="text/javascript">	
	
		CKEDITOR.replace( 'editor1' );
		
		</script>
        

				<?php
				}
		
		}
		
	public function Section($unitControlID){
		
			?>
			<div class="addSomething" onClick="sectionUpdateForm('<?php echo $unitControlID;?>')">
            	<i class="material-icons">add_box</i>
            </div>
            
			<?php
			$Query  = $this->connect->query("SELECT * FROM `course_section` WHERE `course_ID`='$unitControlID' ORDER BY `section_position` ASC");
			
			while($result = $Query->fetch_assoc()){
				
				?>
			<div class="addSomething" onclick="editSection('<?php echo $result['section_ID']; ?>')">
            	<a><?php echo $result['section'];?></a>
            </div>
				<?php
				}
				
				?>
				<script>
                	function editSection(SectionID){
	
	$.post("classes/section_class.php",{SectionID:SectionID},function(data){
		$("#courseUpdates").html(data);
		});
	}	
                </script>
				<?php
		}
		 
	public function Aims(){
		
		}
		
	public function Support(){
		
		}	
				
	
	// update control set
	public function setOverview($OverviewUpdate,$courseID){
		$this->connect->query("UPDATE `course` SET `course_description`='$OverviewUpdate' WHERE `course_ID`='$courseID' ");
		return "<div>".htmlspecialchars_decode($OverviewUpdate)."</div>";
		
	}
	
	public function setSection($account,$courseID,$section,$position){
		$this->connect->query("INSERT INTO `course_section` (`course_ID`,`section`,`account`,`section_position`) VALUES ('$courseID','$section','$account','$position')");
		return $this->Section($courseID);
		}
}
	

// security	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$unitControlID    	= test_input($_POST["unitControlID"]);
	
	
	@$SectionControlID    	= test_input($_POST["SectionControlID"]);
	@$OverviewUpdate	= test_input($_POST["updateOverview"]);
	@$courseID			= test_input($_POST["courseID"]);
	
	//updating section data
	@$sectionUpdate   = test_input($_POST["sectionUpdate"]);
	@$position		= test_input($_POST["position"]);

}
//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$control = new controlSet;

if(isset($unitControlID) && !empty($unitControlID)){
	echo $control->Overview($unitControlID);
	}
if(isset($OverviewUpdate) && !empty($OverviewUpdate)){
	echo $control->setOverview($OverviewUpdate,$courseID);
	}
if(isset($SectionControlID) && !empty($SectionControlID)){
	echo $control->Section($SectionControlID);
	
	}
if(isset($sectionUpdate) && !empty($sectionUpdate)){
	echo $control->setSection($_SESSION['account'],$courseID,$sectionUpdate,$position);

	}		
	

