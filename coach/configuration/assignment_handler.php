<?php


require "config.php";

class assignments extends configuration {
	
		public function EditAssignment($assignmentTitle,$assigndetail,$classid,$assignmentID){
			$this->connect->query("UPDATE `class_assignment` SET `title`='$assignmentTitle',`assignment`='$assigndetail' WHERE `assignmentID`='$assignmentID' ");
			
			
				$query = $this->connect->query("SELECT * FROM `class_assignment` WHERE `class_ID`='$classid' ");?>
		
			<h2 style="">Resources</h2>
                
                <h3>Textbooks</h3><br>
                
                <p>Textbooks are currently unavailable, please check back later when the library comes online</p><br><br>
                
                <h3>Assignments</h3><br>
                <table id='assignment'>
                <?php 
					while($result = $query->fetch_assoc()){
					
					?>
						<tr>
                        	<td><?php echo $result['title'];?></td>
                            <td><a class="btn" onclick="ManageAssing('delete','<?php echo $result['assignmentID']?>','<?php echo $result['class_ID'];?>')">Delete</a></td>
                            <td><a class="btn" onclick="ManageAssing('edit','<?php echo $result['assignmentID']?>','<?php echo $result['class_ID'];?>')">Edit</a></td>
                        </tr>
                       
					<?php
					}
				?>
                </table><br /><br />
                <script>
                    	function ManageAssing(action,assignmentID,classID){
							
							$.post("configuration/master_handler.php",{action:action,classID:classID,assignmentID:assignmentID,handle:"assignment"},function(data) {
								$(".resources").html(data);
																
								});
								
							}
                    </script>
                <a class="btn" style="cursor:pointer" onClick="showAssignment()">Add Assignment</a><br><br>
                
                <h3>Quiz</h3><br>
                <a class="btn" style="cursor:pointer"  href="quiz.php?classID=<?php echo $classid;?>">Add Quiz</a><br><br>
                
                <h3>Transcript</h3><br>
                <a class="btn" style="cursor:pointer">Add Transcript</a><br><br>
            
		
			<?php
			
			}
	
		public function EditFormAssignment($classid,$assignID){

			
			
			?>
				<h2>Assignment</h2>
                    <table>
                    	<tr>
                        	<td>Assignment Title:</td>
                            <td><input type="text" id="assignmentTitle" name="assignmentName">
                            <input type="hidden" id="assignID" value="<?php echo $assignID; ?>">
                            </td>
                        </tr>
                        <tr>
                        
                            <td colspan="2"><textarea name="assignment" id="editor1"></textarea></td>
                        </tr>
                        <tr>
                        	<td> <a class="btn" style="cursor:pointer" onClick="addAssignment('<?php echo $assignID;?>','<?php echo $classid;?>')">Update</a></td>
                        </tr>
                       
                    </table>
                    
                    <script>
                    	function addAssignment(assignID,classID){
							var assignment = $("#assignmentTitle").val();
							var assignID   = $("#assignID").val();
							var detail	   = CKEDITOR.instances.editor1.getData();
								
							$.post("configuration/master_handler.php",{assignmentID:assignID,assignment:assignment,detail:detail,handle:"assignment",action:"editUpdate",classID:classID},function(data){
								$(".resources").html(data);
								});
							}	
							
							// Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                    </script>
			<?php
			
			}
		
		public function DeleteAssignment($assignmentID,$classid) {
		$this->connect->query("DELETE FROM `class_assignment` WHERE `assignmentID`='$assignmentID'");
		
		$query = $this->connect->query("SELECT * FROM `class_assignment` WHERE `class_ID`='$classid' ");?>
			
			<h2 style="">Resources</h2>
                
                <h3>Textbooks</h3><br>
                
                <p>Textbooks are currently unavailable, please check back later when the library comes online</p><br><br>
                
                <h3>Assignments</h3><br>
                <table id='assignment'>
                <?php 
					while($result = $query->fetch_assoc()){
					
					?>
						<tr>
                        	<td><?php echo $result['title'];?></td>
                            <td><a class="btn" onclick="ManageAssing('delete','<?php echo $result['assignmentID']?>','<?php echo $result['class_ID'];?>')">Delete</a></td>
                            <td><a class="btn" onclick="ManageAssing('edit','<?php echo $result['assignmentID']?>')">Edit</a></td>
                        </tr>
                       
					<?php
					}
				?>
                </table><br /><br />
                <script>
                    	function ManageAssing(action,assignmentID,classID){
							
							$.post("configuration/master_handler.php",{action:action,classID:classID,assignmentID:assignmentID,handle:"assignment"},function(data) {
								$("#resources").html(data);
																
								});
								
							}
                    </script>
                <a class="btn" style="cursor:pointer" onClick="showAssignment()">Add Assignment</a><br><br>
                
                <h3>Quiz</h3><br>
                <a class="btn" style="cursor:pointer"  href="quiz.php?classID=<?php echo $classid;?>">Add Quiz</a><br><br>
                
                <h3>Transcript</h3><br>
                <a class="btn" style="cursor:pointer">Add Transcript</a><br><br>
            
			<?php    
			}
		public function NewAssignment($assignmentTitle,$assigndetail,$classid,$assiggnID){
			
				
				$this->connect->query("INSERT INTO `class_assignment` (`class_ID`,`title`,`assignment`) VALUES ('$classid','$assignmentTitle','$assigndetail') ");
				
				$query = $this->connect->query("SELECT * FROM `class_assignment` WHERE `class_ID`='$classid' ");
				
				?>
				<h2 style="">Resources</h2>
                
                <h3>Textbooks</h3><br>
                
                <p>Textbooks are currently unavailable, please check back later when the library comes online</p><br><br>
                
                <h3>Assignments</h3><br>
                <table id='assignment'>
                <?php 
					while($result = $query->fetch_assoc()){
					
					?>
						<tr>
                        	<td><?php echo $result['title'];?></td>
                            <td><a class="btn" onclick="ManageAssing('delete','<?php echo $result['assignmentID']?>','<?php echo $result['class_ID'];?>')">Delete</a></td>
                            <td><a class="btn" onclick="ManageAssing('edit','<?php echo $result['assignmentID']?>')">Edit</a></td>
                        </tr>
                       
					<?php
					}
				?>
                </table><br /><br />
                <script>
                    	function ManageAssing(action,assignmentID){
							
							$.post("configuration/master_handler.php",{action:action,assignmentID:assignmentID,handle:"assignment"},function(data) {
								$(".resources").html(data);
																
								});
								
							}
                    </script>
                <a class="btn" style="cursor:pointer" onClick="showAssignment()">Add Assignment</a><br><br>
                
                <h3>Quiz</h3><br>
                <a class="btn" style="cursor:pointer" href="quiz.php?classID=<?php echo $classid;?>">Add Quiz</a><br><br>
                
                <h3>Transcript</h3><br>
                <a class="btn" style="cursor:pointer">Add Transcript</a><br><br>
                
				<?php
				
			
			
			}
		public function AddAssignment($classID) {
			
			?>
				<h2>Assignment</h2>
                    <table>
                    	<tr>
                        	<td>Assignment Title:</td>
                            <td><input type="text" id="assignmentTitle" name="assignmentName">
                            </td>
                        </tr>
                        <tr>
                        
                            <td colspan="2"><textarea name="assignment" id="editor1"></textarea></td>
                        </tr>
                        <tr>
                        	<td> <a class="btn" style="cursor:pointer" onClick="addAssignment('<?php echo $classID;?>','<?php echo $_SESSION["account"];?>')">Update</a></td>
                        </tr>
                       
                    </table>
                    
                    <script>
                    	function addAssignment(classID,coach){
							var assignment = $("#assignmentTitle").val();
							var detail	   = CKEDITOR.instances.editor1.getData();
								
							$.post("configuration/master_handler.php",{classID:classID,assignment:assignment,detail:detail,handle:"assignment",action:"new"},function(data){
								$(".resources").html(data);
								});
							}	
							
							// Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                    </script>
			<?php
			}	
										
	}

