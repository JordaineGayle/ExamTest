
<!DOCTYPE html>
<html>
    
    <head>
	     <title>Simms Online Academy</title>		 
		 
		 <!----------META---------->
		 <meta http-equiv="Content-Type" content="text/html; charset-utf-8">
		 
		 <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">
		 <link rel="stylesheet" href="css/login.css" type="text/css">
		 
		 <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
		 
		 <script type="text/javascript" src="js/login.js"></script>
		 
		 
    </head>
    
    <body style="background-image:url(image/bakground.png);background-size:100%;">
        <header>
            <div class="loginheader">
            <a href="index.html"><img  src="image/logo.png" width="115px" ></a>
            </div>
        </header>
        
        <div class="choice">
              <div class="policy" style="overflow:auto">
            <h2>Choose Account Type</h2>
            
            <div id="loginCoach" class="Coach" >
                <h2>Coach</h2>
            </div>
            <div id="loginStudent" class="Student">
                <h2>Student</h2>
            </div>
          
        </div>
        </div>
        
        <div class="login">
            <h1>Welcome</h1><br><br>
            <form action="classes/login.php" method="post">
            <div class="inputholder"><input type="text" name="username" style='width:249px' placeholder="Username / Email" /></div><br>
            <div class="inputholder"><input type="password" name="password" placeholder="Password" /><a href="#">Forget Password</a></div>
            <div class="inputholder"><input type="hidden" name="type2" id="type" /></div>
            
            <input type="submit" class="loginButton" value="Log into Your Account" />
           <div id="erroralso"> <a class="loginRegister" >Don't have an account? <strong>Sign Up</strong></a></div>
            </form>
        </div>
        
        <?php
		     $error = $_GET["error"];
    if($error == "wcreden"){
        ?>
        <script>
        
        $(document).ready(function() {
            
        $("#type").val("<?php echo $_GET['user']?>");
        $(".login").fadeIn(1000);
        $(".choice").fadeOut(1000);
        });
        $("#erroralso").html('<p class="loginRegister" style="color:red">Either email or password is incorrect</p>');
        </script>
        <?php
    }
		     ?>
        
		     
		 
    </body>
    
</html>