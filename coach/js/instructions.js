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
function uploadProfileImage() {
	var formData = new FormData();
	formData.append("newfile",$('#profilepic')[0])
	$.ajax({
		url: "classes/profilepic.php",
		type: "POST",
		data: formData,
		cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
        	alert(data);
        }
	});
}	