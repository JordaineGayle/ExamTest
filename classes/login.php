<?php

session_start();
require "config.php";

class login extends configuration {
    
    public function getlogin($user,$p1,$selection) {
        $query = $this->connect->query("SELECT * FROM `users` WHERE `email`='$user' ");
        $result = $query->fetch_assoc();
        $password = $result["password"];
        
        if($selection == 'student'){
        
        if(password_verify($p1,$password)){
            $_SESSION["account"] = $result["Account"];
            echo header("Location:../student/");
        }else{
            echo header("Location:../login.php?error=wcreden&user=student");
        }
            
        }else{
            
        if(password_verify($p1,$password)){
            $_SESSION["account"] = $result["Account"];
            echo header("Location:../coach/");
        }else{
            echo header("Location:../login.php?error=wcreden&user=coach");
        }
                
        }
        
        
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user    = test_input($_POST["username"]);
    $p1      = test_input($_POST["password"]);
    $selection = test_input($_POST["type2"]);

}

//escape function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$reg = new login;

switch ($selection) {
    case 'coach':
        echo $reg->getlogin($user,$p1,$selection);
        
        break;
    
    case 'student':
        echo $reg->getlogin($user,$p1,$selection);

        break;
        
    default:
        // code...
        break;
}
?>