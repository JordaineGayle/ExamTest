<?php

require "config.php";
class Delete extends configuration{
    
    public function del_row($userID){
        if($this->connect == true){
            echo "Connect Successfully";
        }else{
            echo"Error connecting to db";
        }
        
        $sql = "DELETE FROM course_class WHERE class_ID=$userID";
        
        $del = $this->connect->query($sql);
        
        if($del == true){
            echo "Data successfully Deleted";
        }else{
            echo "Data not deleted!";
        }
        
    }
}

?>