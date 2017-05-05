<?php
//session_start();
session_destroy(); 
echo '<p onloadstart="speaker(\'Access Denied\');" >Access Denied!</p>';

echo "<script type='text/javascript'>
            
            function speaker(data){
                responsiveVoice.speak(data);
            }
    
    </script>";
//header('Location: ajaxEnd.php');
?>