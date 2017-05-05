<?php

session_start();
    if(!isset($_SESSION["account"]) && empty($_SESSION["account"])){
        header("Location:../../");
    }
require "../classes/config.php";
 require "classes/profileData.php";
 require "classes/classData.php"; 
 $data = new data;
 $class = new classroom;
 $name = $data->headerInformation($_SESSION["account"]);
 $class->classroomdata($_GET['id']);
 
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="css/coach.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="css/video-js.css" rel="stylesheet">
      <script src="js/videojs-ie8.min.js"></script>
       
      
    
        <title>Classroom</title>
    </head>
    
    <body>
        <header class="header" style="height:64px">
            <span style="text-align:left;" id="name"><?php if($data->name == " "){echo $data->nameform();}else{echo "<h2 style='margin:15px 9px'>".$data->name."</h2>";}?></span>
            <span style="text-align:center" id="center">
            <div>
                <ul style="margin-top:22px">
                    <a><li>Dashboard | </li></a>
                    <a href="classroom.php"><li>Classroom | </li></a>
                    <a href="profile.php"><li>Profile | </li></a>
                    <li>Acheivement | </li>
                    <li>Teachers </li>
                </ul>
            </div>
            </span>
            
                <span style="text-align:right">
                    <a style="text-decoration:none" href="classes/logout.php">
                    <h2 style='margin:15px 9px'>Logout</h2>
                    </a>
                </span>
            
        </header>
        
        
        
        <main>
                    
            
            <section class="profile_section">
                <div class="joinMain" id="main">
              <h2><?php echo $class->classname;?></h2>
              <br><br>
              
              <div id="videoArea" style="float:left; width: 59%;">
              	<?php 
				$video = $class->video;
				
				if(empty($video)){
					
					?>
                    <input type="file" id="videoUpload" hidden name="file" onChange="uploadVideo('<?php echo $_GET['id'];?>')">
					<label for="videoUpload"><div class="video" >Please upload a video</div></label>
					<?php
					
					}else{
						
						?>
						<video id="my-video" class="video-js" controls preload="auto" width="640" height="364"
  poster="MY_VIDEO_POSTER.jpg"  autoplay >
            	<source src="classes/<?php echo $video;?>" type="video/mp4">
                Your browser does not support the video tag
                <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
            </video>
						<?php
						}
				?>	
              </div>
              
              <div class="resources" >
              	<h2 style="">Resources</h2>
                
                <h3>Textbooks</h3><br>
                
                <p>Textbooks are currently unavailable, please check back later when the library comes online</p><br><br>
                
                <h3>Assignments</h3><br>
                <?php $class->assignment($_GET['id']);	
					?>
                <a class="btn" style="cursor:pointer" onClick="showAssignment()">Add Assignment</a><br><br>
                
                <h3>Quiz</h3><br>
                <a class="btn" style="cursor:pointer">Add Quiz</a><br><br>
                
                <h3>Transcript</h3><br>
                <a class="btn uploader" style="cursor:pointer">Add Transcript</a><br><br>
                  <div class="get"></div>
                     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                  
                <script type="text/javascript">
                    
                  $('document').ready(function(){
                      $('.uploader').click(function(){
                          $.post("/simms/coach/classes/uploadform.php",function(data){
                              $(".get").html(data);
                          });
                      });
                  });//needs to minify this
                    
                </script>
                
              </div>
               <div id="editAssignment" style="display:none">
                	<h2>Assignment</h2>
                    <table>
                    	<tr>
                        	<td>Assignment Title:</td>
                            <td><input type="text" name="assignmentName"></td>
                        </tr>
                        <tr>
                        
                            <td colspan="2"><textarea name="assignment" id="editor1"></textarea></td>
                        </tr>
                        <tr>
                        	<td> <a class="btn" style="cursor:pointer" onClick="addAssignment('<?php echo $_GET['id'];?>','<?php echo $_SESSION["account"];?>')">Update</a></td>
                        </tr>
                       
                    </table>
           
                </div>
              <div style="clear:both;height:12px"></div>
                </div>
                
                <div class="joinMain">
                    
                </div>
            </section>
        </main>
        
        
        
        <!--scripts-->
  
        <script src="js/classroom.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script>
		
			// I stopped here 
        	function uploadVideo(classID) {
				var input = $('#videoUpload')[0]; // You need to use standart javascript object here
				var formData = new FormData();
				formData.append('image',$('input[type=file]')[0].files[0]);
				formData.append('classID',classID);
				
				$.ajax({
					url:"classes/video.php",
					type:'POST',
					data:formData,
					contentType:false,
					processData:false,
					xhr: function(){
						var xhr = new window.XMLHttpRequest();

        // Upload progress
        xhr.upload.addEventListener("progress", function(evt){
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total * 100;
                $("#videoArea").html('<progress value="1" max="100"></progress>');
                
  					$("progress").val(percentComplete);
				
				console.log(percentComplete);
            }
       }, false);
	   
	   return xhr;
						},
					error: function(){
						alert("can not upload");
						},
					success: function(data){
						$("#videoArea").html(data);
						}
						
					});
			
			}
			
			$(document).ready(function(){
  $('#my-video').bind('contextmenu',function() { return false; });
});
			
			function addAssignment(classID,coach) {
				var name = $("input[name=assignmentName]").val();
				var assignment = $("textarea[name=assignment]").val();
				
				$.post("classes/section_class.php",{name:name,classID:classID,assignment:assignment},function(data){
					$('#editAssignment').html(data);
					$('.resources').delay(1500).fadeIn(500);
					$('#editAssignment').delay(1000).fadeOut(500);
					});
				}
			function showAssignment(){
				$('.resources').fadeOut(500);
				$('#editAssignment').delay(500).fadeIn(500);
				}	
				
			function addQuiz() {
				
				}
				
			function addTranscipt() {
				
				}		
			
			
        	 
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            
        
        </script>
        
    </body>
</html>