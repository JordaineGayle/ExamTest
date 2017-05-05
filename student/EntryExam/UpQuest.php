<?php
    session_start();
if(isset($_SESSION['ExamID']) && isset($_SESSION['account'])){
if(isset($_SESSION['cout'])){
    $counter = $_SESSION['cout'];
    if($counter > 24 ){
        session_unset($_SESSION["ExamID"],$_SESSION['cout']); 
        session_destroy(); 
        echo"You already Set enough Questions!";
    }else{
        
        echo "You only have ".$counter."/25"." questions";
   


 echo '<html>

    <head>
        <title>Questions</title>
    
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        
                    <style type="text/css">
        .loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url("img/loading.gif") 50% 50% no-repeat rgb(249,249,249);
    background-color: #262729;
}
            
        </style>
    </head>
    
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

    <form method="post" id="form_datas" enctype="multipart/form-data">
        Please input the same answer in any option to prevent patterns along with wrong answers.<br/>
         Questions: <input type="text" name="Questions" required/><br/>
        Answer: <input type="text" name="ans" required/><br/>
        Option1: <input type="text" name="op1"  required/><br/>
        Option2: <input type="text" name="op2" required/><br/>
        Option3: <input type="text" name="op3" required/><br/>
        Option4: <input type="text" name="op4" required/><br/>
        <br/><input type="submit" value="Next Quest" id="sub"/>
<a href="End_Exam.php"><input type="button" value="end" name="destroy" id="des"/></a>
    </form>
    
            <div><p id="feedBack"></p></div>
   <script>
           
      $(document).ready(function(){
            var form = $("#form_datas");
            var fromd = form.serialize();
            var path = "quest_handler.php";
            $("#form_datas").on("submit",function(e){
                e.preventDefault();
                var formData = new FormData($(form)[0]);
            $.ajax({
                url: path,
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(data){
                    $("#feedBack").html(data);
                    $("#feedBack").fadeIn(800).fadeOut(3000);
                   $("#form_datas").get(0).reset();
                }
                
            });
                });
         }); //needs to minify this
         
     
    </script>
    
    
    
</html>';
   
     }
}  
}else{
    echo "No questions here to see!";
    header("Location: Preliminary_Data.php");
} ?>