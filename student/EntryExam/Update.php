<!Doctype html>


<html>
    
    <?php 
session_start();

$coach = $_SESSION['account'];


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
	background: url(\'img/loading.gif\') 50% 50% no-repeat rgb(249,249,249);
    background-color: #262729;
}
            
        </style>
    </head>
    
    
    <body>
    
         <form id="form_datas" method="post" enctype="multipart/form-data">
            <div>ExamID: <input type="text" name="exam" id="examID" placholder="exam title" />&nbsp;<span id="feedback"></span></div><br/>
           <input type="submit" value="Update" id="update"/> <a href="Preliminary_Data.php"><input type="button" value="Back" id="sub"/></a> 
         
        </form> 
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
        <script>
            
            
            
            $("document").ready(function(){
                
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
                
            var form = $("#form_datas");
            var fromd = form.serialize();
            var path = "update_handler.php";
                
            $("#examID").mouseover(function(){
                $("#update").attr("enabled","enabled");
                $("#update").removeAttr("disabled");
            });
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
                    $("#feedBack").fadeIn(800).fadeOut(4000);
                   $("#form_datas").get(0).reset();
                    $("#update").attr("disabled","disabled");
                    //$("#cont").fadeIn(1000);
                }
                
            });
                });
         }); //needs to minify this
         
     
        </script>
        <div id="feedBack"></div><a href="UpQuest.php" ><input type="button" value="continue" id="cont" style="display:none;"/></a>
    </body>';}else{
       header("Location: /simms/login.html");
   }
?>
</html>