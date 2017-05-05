<?php
session_start();
    if(!isset($_SESSION["account"]) || empty($_SESSION["account"])){
        header("Location:../");
    }
require "../classes/config.php";
require "classes/profileData.php"; 
 
 $data = new data;
 $dataSource = $data->headerInformation($_SESSION["account"]);
 $name = $data->name;
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="css/student.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
    
        <title>Profile</title>
    </head>
    
    <body>
        <header class="header">
            <span style="text-align:left" id="name"><?php if($name == " "){echo $data->nameform();}else{echo "<h2>".$name."</h2>";}?></span>
            <span style="text-align:center" id="center"><img width='124px' src="assets/logo.png">
            <div>
                <ul>
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
                    <h2>Logout</h2>
                    </a>
                </span>
            
        </header>
        
        <main>
            <aside>
                <div>
                    <h2>Groups</h2>
                    <div class="join"><i class="material-icons">add_box</i>
                    <span>Join a Group</span></div>
                </div>
                <div>
                    <h2>Events</h2>
                    <div>No current events</div>
                </div>
            </aside>
            
            <section>
                <div class="joinMain" style="height:250px">
                    <p>You have not joined a course as yet</p>
                    <a href='classroom.php'><i class="material-icons">add_box</i><span>Add a Course</span></div></a>
        
                </div>
                
                <div class="joinMain">
                    <h2>Books</h2>
                    <i class="material-icons">add_box</i><span>Rent a Book</span></div>
                </div>
            </section>
        </main>
        
        
        <!--scripts-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/instructions.js"></script>
    </body>
</html>