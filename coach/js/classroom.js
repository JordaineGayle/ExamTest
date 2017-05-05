// JavaScript Document

function addCourse(selection) {
		$(".container_main,.container_select").fadeIn(500);
	}
	
	
	
	
function cancelAddCourse(){
	$(".container_main,.container_select").fadeOut(500);
	}	
	
	
	
	
function addCourceSelection(subject,identifier){
	$.post("classes/extention.php",{subject:subject,collect:"addCourseEdit"},function(data){
		$("#main").html(data);
		$("#main").animate({height:"600px"},1000);
		});
		
		
		
	}

function UpdateAims(amount,courseName) {
		
		for(i = 1; i <= amount; i++){
			
			var variable = 	$("#option"+i).val();
			if(variable == " "){
				break;
				}else{
					
					$.post("classes/courseScripts.php",{updateAims:variable,courseName:courseName});		
					}
			}
			
	$.post("classes/courseScripts.php",{showSectionField:"true",courseName:courseName},function(data){
		$("#editAims").html(data);
		});
	
	
}	


	
function UpdateSection(amount,courseName) {
	
	
	for(i = 1; i <= amount; i++){
			var sectionVariable = 	$("#sectionOption"+i).val();
				
			$.post("classes/courseScripts.php",{updateSection:sectionVariable,courseName:courseName});
			
			}
	$("#editAims").html("Your course is all set, thank you for registering");
	
	}
	
	
	
	
function UpdateSectionAdditional(courseID) {
	// currently working here 
	var setSection = $("#setSection").val();
	var value = $("#sectionPosition").val();
	
		$.post('classes/controlsetext.php',{courseID:courseID,sectionUpdate:setSection,position:value},function(data){
				$("#courseUpdates").html(data);
					});
	} 	
	
	
	
	
function load_course(course){
	$.post("classes/courseControl.php",{course:course},function(data){
		$("#main").html(data);
		});
	}
	
	
	
	
function UpdateOverview(ID){
			var courseID = ID;
			var update = CKEDITOR.instances.editor1.getData();
			
			$.post("classes/controlsetext.php",{updateOverview:update,courseID:courseID},function(data){
				$("#courseUpdates").html(data);
				});
			}	
		
function sectionUpdateForm(ID) {
		
		$("#courseUpdates").load("classes/courseControl.php",{courseForm:ID});
		
	}	
	
		