<?php 

session_start();

require 'classes/PaypalIPN.php';


$paypal = new Paypal_IPN;
$paypal->check('sandbox');

echo $paypal->run($_SESSION['student_subject_ID'],$_SESSION["account"]);
