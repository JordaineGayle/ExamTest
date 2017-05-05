<html>
    
    <?php 
    
    session_start();
    
    $car = $_SESSION['account'];
    
    if(isset($_SESSION['account'])){
    

    
echo '<head>
    

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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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

    <form id="send" enctype="multipart/form-data" method="post">
<div>Please Input Your Exam ID: <input name="id" type="number" id="examID" onkeypress="return isNumberKey(event)" placeholder="ExamID..." required/>&nbsp;<span id="feedback"></span></div><br/>
          
        <input type="submit" value="Login" id="sub"/>
    </form>
  <p id="res"></p>
    <script>
        
        
        $("#examID").keyup(function(){
           var idvar =  $(this).val();
            var path = "checker.php";
           $("#feedback").html(\'<img src="img/ajax-loader.gif"/>\');
            setTimeout(function(){
                $.post(path,{check:idvar},function(data){
                $("#feedback").html(data);
            });
            },1000);
            
        });
        
        $("#student").keyup(function(){
           var idvar =  $(this).val();
            var idvar2 =  $("#examID").val();
            var path = "checkstudent.php";
           $("#feedbacks").html(\'<img src="img/ajax-loader.gif"/>\');
            setTimeout(function(){
                $.post(path,{studentID:idvar,check:idvar2},function(data){
                $("#feedbacks").html(data);
            });
            },1000);
            
        });
        
        
    
        $("#send").submit(function(e){
            e.preventDefault();
            var path = "merger.php";
            var id = $("#examID").val();
            var sid = $("#student").val();
            var tempID = $("#tempID").val();
            $.post(path,{id:id,sid:sid,tempID:tempID},function(data){
               $("#res").html(data); 
            });
        });
        
    </script>
    
    <script>
        
        
            function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
            
        </script>'; 
    }else{
        header("Location: /simms/login.html");
    }
    ?>
    
    
    <div><input name="sid" type="hidden" id="student" onkeypress="return isNumberKey(event)" value="<?php echo $car; ?>" required disabled="disabled"/>&nbsp;<span id="feedbacks"></span></div><br/>
    <?php require("random.php"); ?><br/>
    
</html>