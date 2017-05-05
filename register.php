<?php
	$type = $_GET['type'];
?>

<!DOCTYPE html>
<html>
    
    <head>
	     <title>Simms Online Academy</title>		 
		 
		 <!----------META---------->
		 <meta http-equiv="Content-Type" content="text/html; charset-utf-8">
		 
		 <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">
		 <link rel="stylesheet" href="css/register.css" type="text/css">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
      <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/register.js"></script>
    </head>
    
    <body style="background-image:url(image/bakground.png);background-size:100%;">
        <header>
            <div class="loginheader">
            <a href="index.html"><img  src="image/logo.png" width="115px" ></a>
            </div>
        </header>
        
        <div class="register">
            <h1>Create An Account</h1>
            <p>With an account, you will be able to participate in classes and complete assessments ans tasks. All the learning tools will be available to you depending on your subscription</p><br><br>
            <form action="classes/register.php" method="post">
            <div class="inputholder"><input type="text" name="username" placeholder="Email"></div>
            
            <div class="inputholder"><input type="password" name="password1" placeholder="Password"><a href="#"><i class="material-icons">help</i></a></div>
            <div id="passworderror"></div>
            <div class="inputholder"><input type="password" name="password2" placeholder="Retype Password"><a href="#"><i class="material-icons">help</i></a></div>
            <div class="inputholder"><input type="checkbox" name="termscheck" style="width:60px;margin-right:5px" value="accept">I agree to the <a href="terms.html">terms of use</a> and Privacy Policy</div>
            <input type="hidden" name="selection" value="<?php echo $type;?>"/>
            <input class="loginButton" type="submit" value="Register for an Account">
            <strong>
                <?php 
                    if($_GET['error'] == "noaccept"){
                        echo "Please accept the terms and conditions before you continue";
                    }
                ?>
            </strong>
            <a class="loginRegister" href="register.html">Already have an account? <strong>Login</strong></a>
            </form>
        </div>
    </body>
    
</html>