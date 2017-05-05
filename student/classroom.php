<?php
session_start();
    if(!isset($_SESSION["account"]) && empty($_SESSION["account"])){
        header("Location:../../");
    }
require "classes/config.php";
 require "classes/profileData.php"; 
 
 $data = new data;
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
            
                
            <aside class="profile_aside">
                <div>
                   <h2>Current Courses</h2> 
                </div>
               
                
             
                </div>
            </aside>
            
            <section class="profile_section">
                <div class="joinMain" id="main" >
              
              
              <?php 
                    $results = $data->checkPayment($_SESSION["account"]);
                    
                    if($results == true){
                        ?>
                            <h2>Please select a Course to start</h2>
                            
                            <?php echo $data->courses();?>
                            <div style="height:2px;clear:both"></div>
                        <?php
                    }
                    
                    if($results == false){
                        ?>
                         <h2>Simms Online Academy Registration</h2>
                         <p>Thank you for choosing Simms Online Academy for completing your preferred couse. To register for this course, please click on the button below to pay the registration fee. This fee is non refundable.</p>

                   <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8JAR2ZD95YWDN">  
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

                        <?php
                    }
                ?>
                </div>
                    
                <div class="joinMain">
                    
                </div>
            </section>
        </main>

        
        
        <!--scripts-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="js/classroom.js"></script>
    </body>
</html>