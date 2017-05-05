$(document).ready(function() {

    $("#loginCoach").click(function() {
       
       $("#type").val("coach");
	   $('.loginRegister').attr("href","register.php?type=coach");
       $(".login").fadeIn(1000);
       $(".choice").fadeOut(1000);
       
    });
    
    $("#loginStudent").click(function() {
       $("#type").val("student");
	   $('.loginRegister').attr("href","register.php?type=student");
       $(".login").fadeIn(1000);
       $(".choice").fadeOut(1000);
    });
 
 
    
});

function login(){
     alert("hello");
 }