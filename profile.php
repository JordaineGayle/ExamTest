<?php
session_start();
    if(!isset($_SESSION["account"]) && empty($_SESSION["account"])){
        header("Location:../../");
    }
require "../classes/config.php";
require "classes/profileData.php"; 
 
 $data = new data;
 $id = $_SESSION["account"];
 $name = $data->headerInformation($id);
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="css/coach.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <!--scripts-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/instructions.js"></script>
      
    
        <title>Profile</title>
    </head>
    
    <body>
        <header class="header">
            <span style="text-align:left" id="name"><?php if($data->name == " "){echo $data->nameform();}else{echo "<h2>".$data->name."</h2>";}?></span>
            <span style="text-align:center" id="center"><img width='124px' src="assets/logo.png">
            <div>
                <ul>
                     <a href="index.php"><li>Dashboard | </li></a>
                    <a href="classroom.php"><li>Classroom | </li></a>
                    <a href="profile.php"><li>Profile | </li></a>
                    <li>Acheivement | </li>
                    <li>Students </li>
                </ul>
            </div>
            </span>
            
                <span style="text-align:right">
                    <a style="text-decoration:none" href="classes/logout.php">
                    <h2>Logout</h2>
                    </a>
                </span>
            
        </header>
        
        <main>
            <aside class="profile_aside">
                <div>
                    <p class="centerAlign">Settings</p>
                    <p onClick="general()">General</p>
                    <p onClick="security()">Security</p>
                </div>
                <div>
                    <p class="centerAlign">Results For /%Math%/</p><br>
                    
                    	<table>
                        	<tr>
                            	<td><p>Exam Position</p></td>
                                <td><p>N/A</p></td>
                            </tr>
                            <tr>
                            	<td><p>Exam Score</p></td>
                                <td><p>N/A</p></td>
                            </tr>
                        </table>
                        <br>
                        <p class='centerAlign'>Course Completion</p><br>
                        <table style="71%">
                        	<tr>
                            	<td><p>/%Math%/</p></td>
                                <td><p>N/A</p></td>
                            </tr>
                            <tr>
                            	<td><p>/%English Language%/</p></td>
                                <td><p>N/A</p></td>
                            </tr>
                        </table>
                    
                </div>
                
                 <div>
                    <p class="centerAlign">Badges</p>
                    <div>
                    	<table>
                        	<tr>
                            	<td><p>Top Performer</p></td>
                                <td><p>No Badge</p></td>
                            </tr>
                            <tr>
                            	<td><p>Best Test Results</p></td>
                                <td><p>No Badge</p></td>
                            </tr>
                            <tr>
                            	<td><p>Subject badge of honor</p></td>
                                <td><p>No Badge</p></td>
                            </tr>
                        </table>
                        
                        
                    </div>
                </div>
            </aside>
            
            <section class="profile_section">
                <div class="joinMain" id="main" style="height:250px">
                   
        
                </div>
                
                <div class="joinMain">
                    
                </div>
            </section>
        </main>
        
        
       
    </body>
</html>