<?php
session_start();
$ID = $_SESSION["account"];
require "../../classes/config.php";


class section extends configuration {
	
	public function getClasses($SectionID,$ID){
		echo "<h2>Classes</h2>";
		
		?>
		<ul class="controlPanel">
        	<li onClick="addClass()"><a class="btn">New</a></li>
            <li ><a class="btn" disabled="disabled">Delete</a></li>
        </ul>
		<?php
		
		$query = $this->connect->query("SELECT * FROM `course_class` WHERE `section_ID`='$SectionID' ");
		
		?>
			<table>
            <tr>
                    	<th></th>
                        <th>Class ID</th>
                        <th>Class Name</th>
                        <th>Actions</th>
             </tr>
		<?php
		
		while($result = $query->fetch_assoc()){
			$classID = $result['class_ID'];
			?>
            
            	
                	
                    <tr id="classrecord<?php echo $classID;?>">
                    	<td ><input type='checkbox' onselect="selectClass()"></td>
                        <td><?php echo $classID;?></td>
                        <td><?php echo $result['class_name'];?></td>
                        <td>
                        <ul class="controlPanel">
                                
                            <li ><a class='btn delete' id="<?php echo $classID;?>" onclick="deleteClass(id)">delete</a></li>      
                            <li><a class="btn">Move up</a></li>
                            <li><a class="btn">Move down</a></li>
                            <li><a class="btn" href="classroomData.php?id=<?php echo $classID;?>" >Edit</a></li>
                        </ul>
                        </td>
                    </tr>
               
			<?php	
			}
			
			?>
                <script type="text/javascript" >
                	function deleteClass(classID) {
                		if(confirm("Are you sure you want to delete")){
                			$.post("configuration/del_handler.php",{info:classID},function(data){
                				
                				$("#classrecord"+classID).fadeOut(2000,function(){
                					
                					$("#classrecord"+classID).remove();
                					
                				});		
                			});
                		};
                	}
                	
                   /* $(function(){
                        $(".delete").click(function(){
                            var element = $(this);
                            var userid = element.attr("id");
                            var info = 'id=' + userid;
                            
                            if(confirm("Are you sure you want to delete")){
                            $.ajax({
                            url: '../../simms/coach/configuration/call_del_func.php',
                            type: 'POST',
                            data: info,
                            success: function(data){
                            
                        }
                        });
                        $(this).parent().parent().parent().parent().fadeOut(2000,function(){
                            $(this).remove();
                        });
                        };
                      return false;
                        });
                    });
                    */
                    
                </script>
            	</table>


						      	
            
            <script>
            	function addClass() {
					$.post("classes/section_class.php",{loadClass:"addClass",SectionID2:"<?php echo $SectionID;?>"},function(data){
						$("#courseUpdates").html(data);
						});
					}
					
				
            </script>
		<?php
		}
	
	public function addAssignment($assignmentName,$assignDetails,$classID,$coach){
		$this->connect->query("INSERT INTO `class_assignment` (`class_ID`,`title`,`assignment`,`coach`) VALUES ('$classID','$assignmentName','$assignDetails','$coach')");
		
		echo "Assignment was added successfully.";
		}
	public function editAssignment($classID,$edit,$assignDetails,$assignmentName) {
		
		if($edit == "assign"){
			
			$query = $this->connect->query("UPDATE `class_assignment` SET `title`='$assignmentName',`assignment`='$assignDetails' WHERE `class_ID`='$classID'");
			
			$query = $this->connect->query("SELECT * FROM `class_assignment` WHERE `class_ID`='$classID' ");
			
			while($result = $query->fetch_assoc()){
				
				?>
					
                    	<tr>
                        	<td><?php echo $result['title'];?></td>
                            <td><?php echo $result['assignment'];?></td>
                            <td><a class="btn" onclick="ManageAssing('delete','<?php echo $result['class_ID']?>')">Delete</a></td>
                            <td><a class="btn" onclick="ManageAssing('edit','<?php echo $result['class_ID']?>')">Edit</a></td>
                        </tr>
                    
				<?php
				
				}
				
				
				
			
			}else{
			
			?>
			<h2>Assignment</h2>
            <input type="hidden" value="<?php echo $classID;?>" name="ID">
                    <table>
                    	<tr>
                        	<td>Assignment Title:</td>
                            <td><input type="text" name="assignmentNameEdit"></td>
                        </tr>
                        <tr>
                        
                            <td colspan="2"><textarea name="assignmentedit" id="editor1"></textarea></td>
                        </tr>
                        <tr>
                        	<td> <a class="btn" style="cursor:pointer" onClick="editAssignment()">Update</a></td>
                        </tr>
                       
                    </table>
                    <script>
                    	functon editAssignment() {
							var id = $("input[name=ID]").val();
							var name = $("input[name=assignmentNameEdit]").val();
							var assignment = $("input[name=assignmentedit]").val();
							
							$.post("classes/section_class.php",{name:name,classID:id,assignment:assignment,readyassignedit:"assign"},function(data){
								
								});
							}
							// Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                    </script>
           
		<?php
				
				}
		
		
		
		}
	public function DeleteAssignment($classID) {
		$this->connect->query("DELETE FROM `class_assignment` WHERE `class_ID`='$classID'");
		
		$query = $this->connect->query("SELECT * FROM `class_assignment` WHERE `class_ID`='$classID' ");
			
			
			while($result = $query->fetch_assoc()){
				
				?>
					
                    	<tr>
                        	<td><?php echo $result['title'];?></td>
                            <td><?php echo $result['assignment'];?></td>
                            <td><a class="btn" onclick="ManageAssing('delete','<?php echo $result['class_ID']?>')">Delete</a></td>
                            <td><a class="btn" onclick="ManageAssing('edit','<?php echo $result['class_ID']?>')">Edit</a></td>
                        </tr>
                    
				<?php
				
				}
				
				
		}				
		
	public function addClassesExt($section){
		
		?>
			
            	<input type="text" name="addClasses" />
                <a class="button" onclick="SaveNewClasses()">Save</a>
            
            
            <script>
            	function SaveNewClasses() {
					var addClasses = $("input[name=addClasses]").val();
					
					$.post("classes/section_class.php",{addClasses:addClasses,SectionID2:"<?php echo $section;?>"},function(data){
						$("#courseUpdates").html(data);
						});
					}
            </script>
		<?php
		
		}
		
	public function addClasses($addClasses,$SectionID){
		$this->connect->query("INSERT INTO `course_class` (`section_ID`,`class_name`) VALUES ('$SectionID','$addClasses')");
		$query = $this->connect->query("SELECT * FROM `course_class` WHERE `section_ID`='$SectionID' ");
		
		?>
			<table>
            
            <tr>
                    	<th>Action</th>
                        <th>Class ID</th>
                        <th>Class Name</th>
                        <th></th>
             </tr>
		<?php
		
		while($result = $query->fetch_assoc()){
			$classID = $result['class_ID'];
			?>
            
            	
                	
                    <tr>
                    	<td><input type='checkbox' onselect="selectClass()"></td>
                        <td><?php echo $result['class_ID'];?></td>
                        <td><?php echo $result['class_name'];?></td>
                    </tr>
                
				
                
               
			<?php	
			}
			
			?>
            	</table>
				 <script>
                	function selectClass() {
						alert("hello");
						}
                </script>
			<?php
		}			
	
	}
	
	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    @$SectionID    	= test_input($_POST["SectionID"]);
	@$SectionID2    	= test_input($_POST["SectionID2"]);
	
	@$loadClass		= test_input($_POST["loadClass"]);
	
	@$addClasses 	= test_input($_POST["addClasses"]);
	
	@$editClasses   = test_input($_POST["editClassData"]);
	
	//add assignment
	@$assignmentName = test_input($_POST["name"]);
	@$assignDetails  = test_input($_POST["assignment"]);
	@$classID		 = test_input($_POST["classID"]);
	@$edit		 = test_input($_POST["readyassignedit"]);
	
	//modify assignment
	@$action		 = test_input($_POST["action"]);

}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}	

$section = new section;

if(isset($SectionID) && !empty($SectionID)){
	$section->getClasses($SectionID,$ID);
	}
if(isset($loadClass) && !empty($loadClass)){
	$section->addClassesExt($SectionID2);
	}
if(isset($addClasses) && !empty($addClasses)){
	$section->addClasses($addClasses,$SectionID2);
	}
if(isset($editClasses) && !empty($editClasses)){
	$section->editClasses($editClasses);
	}
if(isset($assignmentName) && !empty($assignmentName)){
	$section->addAssignment($assignmentName,$assignDetails,$classID,$_SESSION["account"]);
	}
if(isset($action) && !empty($action)){
	if($action == 'delete'){
		$section->DeleteAssignment($classID);
		}else{
		$section->editAssignment($classID,$edit,$assignDetails,$assignmentName);	
			}
	}					
if(isset($edit) && !empty($edit)){
	$section->editAssignment($classID,$edit,$assignDetails,$assignmentName);
	}	
	
