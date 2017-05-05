<?php
session_start();
    if(!isset($_SESSION["account"]) && empty($_SESSION["account"])){
        header("Location:../../");
    }
require "classes/config.php";
require "classes/payment.php";
require "classes/profileData.php"; 
 
 $data = new data;
 $payments = new payment;
 $name = $data->headerInformation($_SESSION["account"]);
 

?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="css/student.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
    
        <title>Classroom</title>
    </head>
    
    <body>
        <header class="header" style="height:64px">
            <span style="text-align:left;" id="name"><?php if($data->name == " "){echo $data->nameform();}else{echo "<h2 style='margin:15px 9px'>".$data->name."</h2>";}?></span>
            <span style="text-align:center" id="center">
            <div>
                <ul style="margin-top:22px">
                    <a><li>Dashboard | </li></a>
                    <a><li>Classroom | </li></a>
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
            <main>
                
            <aside class="profile_aside">
                <div>
                   <h2>Current Courses</h2> 
                </div>
               
                
             
                </div>
            </aside>
            
            <section class="profile_section">
                <div class="joinMain" id="main" style="height:250px">
                    <h1>Thank you for joining Simms Online Academy</h1>
                    <p>Your registration was successful and you can now proceed to paying for a class</p>
<<<<<<< HEAD
                    <?php $payments->setPaymentRegister($_GET['tx'],"0",$_SESSION["account"]);?><br><br>
=======
                    <?php $payments->setPaymentRegister($_GET['tx'],$_SESSION["account"]);?><br><br>
>>>>>>> cdc5e0ab08214cd58fcd3baa2b55159587420577
                    <a class='btn' href='classroom.php'>Back to class</a>
                </div>
                    
                <div class="joinMain">
                    
                </div>
            </section>
        </main>
        </main>
        
        
        <!--scripts-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/instructions.js"></script>
    </body>
</html>