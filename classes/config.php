<?php

class configuration {

public $connect;

  public function __construct(){
    $this->connect = mysqli_connect("localhost","BOB","","bob");
    #$this->connect = mysqli_connect("localhost","sgtcadet","","emelio_devel002");

  }
    
}
?>
