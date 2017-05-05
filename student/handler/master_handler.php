<?php

session_start();
require "../classes/config.php";
require "subject_handler.php";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $subject_ID    = test_input($_POST["subject_ID"]);
    $videoHandle   = test_input($_POST[""]);
    

}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$courseObject = new course;
$courseObject->selectCourse($subject_ID);
$_SESSION['student_subject_ID'] = $subject_ID;


if(!empty($subject_ID)){
		if(!empty($courseObject->image)){
			?> 
				<img src="../coach/<?php echo $courseObject->image;?>" style='width:330px;float:left'>
			<?php
		}else{
			?>
				<img src="assets/placeholder.png" style='width:330px;float:left'>
			<?php
		}
	?>	
		
        
		
		<div style='background-image:none;'>
			<h2><?php echo $courseObject->couseName;?></h2>
			<p><?php echo html_entity_decode($courseObject->description);?></p><br>

			<?php 			
				$paymentCheck = $courseObject->checkpayment($_SESSION['student_subject_ID']);
				if($paymentCheck == true){
					?>
						<a class="btn" href="activeClass.php">Enter Course</a>
					<?php
				}else{
					?>
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="Y38STB8CAPKDG">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
					<?php
				}
			?>
		
			<a class="btn" onclick="subscribeToCourse()">Subscribe</a>

		</div>
		<div style='height:10px;clear:both'></div>
    <?php
}

if(!empty($videoHandle)){
	
}