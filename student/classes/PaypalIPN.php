<?php
session_start();
require 'classes/config.php';
class Paypal_IPN extends configuration {
<<<<<<< HEAD
    public $_url,$account,$subject;
=======
    public $_url;
>>>>>>> cdc5e0ab08214cd58fcd3baa2b55159587420577
  
    /**
    * @param $mode 'live' or 'sandbox'
    */

    public function check($mode = 'live'){
        if($mode == 'live'){
        $this->_url = 'https://ipnpb.paypal.com/cgi-bin/webscr';
        
        }
        if($mode == 'sandbox'){
        $this->_url = "https://ipnpb.sandbox.paypal.com/cgi-bin/webscr";     
        }
      
        
    }
    
<<<<<<< HEAD
    public function run($subject,$account) {
        $this->subject = $subject;
        $this->account = $account;
=======
    public function run() {
>>>>>>> cdc5e0ab08214cd58fcd3baa2b55159587420577
        $postFields = 'cmd=_notify-validate';
            
        foreach($_POST as $key => $value){
            
            $postFields .= "&$key = $value";
            
        }
        
        $ch = curl_init();
        
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postFields
            ));
        
        $result = curl_exec($ch);
        
        
        $fh = fopen("test.txt", 'w');
        fwrite($fh, $result." -- ".$postFields);
        fclose($fh);
        
        curl_close($ch);
        
        echo $result;
        $this->updatePayment($postFields);
        
    }
    
    private function updatePayment($postFields) {
        // fields
        $finalArray = array(); 
         
            $workingarray = explode('&',$postFields);
            foreach($workingarray as $value){
                $newArray = explode(' = ',$value);
                $value1 = $newArray[0];
                $value2 = $newArray[1];
                $finalArray[$value1] =  $value2;
                
            }
            
            $payment_type   = $finalArray['payment_type'];
            $payment_date   = $finalArray['payment_date'];
            $payment_status = $finalArray['payment_status'];
            $mc_gross       = $finalArray['mc_gross'];
            $tx             = $finalArray['txn_id'];
            $payID          = $finalArray['payer_id'];
            $address_street = $finalArray['address_street'];
            $payer_email    = $finalArray['payer_email'];
<<<<<<< HEAD
            $item_name      = $finalArray['item_name'];

            
            if(!empty($payment_status)){
                 $myQuery = "INSERT INTO `payments` (`payment_type`,`payment_date`,`payment_status`,`Account`,`tx`,`mc_gross`,`payer_id`,`address_street`,`payer_email`,`item_name`) VALUES ('$payment_type','$payment_date','$payment_status','$account','$tx','$mc_gross','$payID','$address_street','$payer_email','$item_name')";
                $this->connect->query($myQuery);
                
            }
                
               
        
            
            
    
        
=======
        
        $myQuery = "INSERT INTO `payments` (`payment_type`,`payment_date`,`payment_status`,`tx`,`mc_gross`,`payer_id`,`address_street`,`payer_email`) VALUES ('$payment_type','$payment_date','$payment_status','$tx','$mc_gross','$payID','$address_street','$payer_email')";
        $this->connect->query($myQuery);
>>>>>>> cdc5e0ab08214cd58fcd3baa2b55159587420577
    
    } 
}