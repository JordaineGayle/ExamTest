<?php 

class configuration {

public $connect;
  
  public function __construct(){
    $this->connect = mysqli_connect("localhost","v5z4a0x4_SOC","OX4Ndt[v9_tC","v5z4a0x4_soc");
    #$this->connect = mysqli_connect("localhost","sgtcadet","","emelio_devel002");
 
  }
}