<?php
session_start();
    if(!isset($_SESSION["account"]) && empty($_SESSION["account"])){
        header("Location:../../");
    }
require "../classes/config.php";
 require "classes/profileData.php";
 require "classes/classData.php"; 
 
 $data = new data;
 $name = $data->headerInformation($_SESSION["account"]);

 
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="css/coach.css" type="text/css">
        <link rel="stylesheet" href="css/quiz.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="css/video-js.css" rel="stylesheet">
      <script type="text/javascript" src="../js/jquery-2x.min.js"></script>
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
              
                    <h2>Quiz Creator Tool</h2>
                    
                    <div class="questiontype" onclick="questionType('short')">
                        <p>Multiple Choice Questions</p>
                    </div>
                    <div class="questiontype" onclick="questionType('long')">
                        <p>Short Answer Questions</p>
                    </div>
              
                </div>
                <div style="clear:both;height:12px"></div>  
                <div class="joinMain">
                    
                </div>
            </section>
        </main>
        
        
        
        <!--scripts-->
        <script type="text/javascript" src="../js/jquery-2x.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script>
            function addQuestion(){
                
                 var counter = $("#counter").val();
                counter = Number(counter);
                counter = counter + 1;
                counter = String(counter);
                $("#counter").val(counter);
                
                $("#questionContainer").append("<div class='question"+counter+"'></div>");
                
                $(".question"+counter).load("quizApp/loadquiz.html #newQuestion");
                
               
                
            }
            
            function SaveQuiz(){
                 var counter = $("#counter").val();
                var testTime = $("input[name=timeMinutes]").val();
                var testTitle = $("input[name=quiztitle]").val();
                counter = parseInt(counter);
                
                   $.post("configuration/master_handler.php",{testTime:testTime,testTitle:testTitle,handle:"addQuiz",phase:"phaseOne",classID:'<?php echo $_GET["classID"]; ?>'},function(data){
                   $("#short").html(data);
               });
                
                for(i = 1;i <= counter;i++){
                    var question = $(".question"+i+" input[name=question]").val();
                    var option1 = $(".question"+i+" input[name=option1]").val();
                    var option2 = $(".question"+i+" input[name=option2]").val();
                    var option3 = $(".question"+i+" input[name=option3]").val();
                    var option4 = $(".question"+i+" input[name=option4]").val();
                    
                    $.post("configuration/master_handler.php",{question:question,option1:option1,option2:option2,option3:option3,option4:option4,handle:"addQuiz",phase:"phaseTwo"},function(data){
                       
                       
                    });
                }
                
               
             
               
               
            }
            
		
            function questionType(type) {
                if(type == "short"){
                  $("#main").load("quizApp/loadquiz.html #short");
                   }
                
                if(type == "long"){
                    $("#main").load("quizApp/loadquiz.html #long");
                }   
            }
	
        </script>
        
    </body>
</html>