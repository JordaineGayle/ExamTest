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
                    
                    <div onclick="questionType('short')">
                        <p>Multiple Choice Questions</p>
                    </div>
                    <div onclick="questionType('long')">
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