<?php

require "config.php";

class Delete extends configuration{
    
    public function del_row($userID){
        
        $this->connect->query("DELETE FROM `course_class` WHERE `class_ID`='$userID'");
        $this->connect->query("DELETE FROM `class_assignment` WHERE `class_ID`='$userID'");
        //$this->connect->query("DELETE FROM `quiz` WHERE `class_ID`='$userID'");
        
    }
}

?>
