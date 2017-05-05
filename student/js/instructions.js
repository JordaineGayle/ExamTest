// JavaScript Document

function SaveName() {
	
	var fname = $("input[name=fname]").val();
	var lname = $("input[name=lname]").val();
	 
	 
	$.post('classes/updateprofile.php',{fname:fname,lname:lname},function(data){
		$("#name").html(data);
		});
	
	}
	

//profile functions 
function general() {
	
	$.post("classes/extention.php",{collect:"general"},function(data){
			$("#main").html(data);
		});
	}	
	
function security() {
	$.post("classes/extention.php",{collect:"security"},function(data){
			$("#main").html(data);
		});
	}	
function updatePassword(identifier){
		alert("there is a issue with this button, please contact developer");
	}	