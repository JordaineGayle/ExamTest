<?php
session_start();
    // remove all session variables
session_unset($_SESSION["account"]); 

// destroy the session 
session_destroy($_SESSION["account"]); 


//redirect to homepage
header('Location:../../index.html');


?>