<?php 
session_start();
?>

<!doctype html>


<html>

    <head>
    
        <title>Preliminary Data</title>
        <style type="text/css">
        .loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('loading.gif') 50% 50% no-repeat rgb(249,249,249);
    background-color: #262729;
}
            
        </style>
    
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    
    <body>
    
        <form id="form_data" method="post" enctype="multipart/form-data" action="preliminary_handler.php">
            CoachID: <input type="text" name="coach" id="coach" placholder="your ID" required/><br/>
            Exam Title: <input type="text" name="examTitle" id="examTitle"placholder="exam title"  required/><br/>
            Subject: <input type="text" name="subject" id="subject" placholder="subject" required/><br/>
            Duration: <input type="number" name="duration" id="duration" placholder="time take...." required/><br/>
            Description: <textarea name="description" rows="2" cols="20" placeholder="Optional..."></textarea><br/>
            <input type="submit" value="Start" id="sub"/><a href="Update.php"><input type="button" value="Update" id="update"/></a> 
         
        </form> 
         <div class="loader"></div>
        <script type="text/javascript">
            $("document").ready(function(){
                 $(window).load(function() {
	setTimeout(function(){
           $(".loader").fadeOut(5000);
        },5000);
});
            });
            
        

</script>
         
    </body>

</html>

<?php


?>
