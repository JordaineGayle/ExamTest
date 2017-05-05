<?php 

class course extends configuration {
	

	public $couseName,$description,$image;

    
    public function selectCourse($subject_ID){
		$liveQuery = "SELECT * FROM `course` WHERE `course_ID`='$subject_ID' ";
        $query = $this->connect->query($liveQuery);
		
		while($result = $query->fetch_assoc()){
			$this->couseName = $result['course_name'];
			$this->description = $result['course_description'];
			$this->image	= $result['image'];
		}
    }
    
    public function checkpayment($courseID){
    	$query = $this->connect->query("SELECT `course_ID` FROM `payments` WHERE `course_ID`='$courseID' ");
    	$result = $query->fetch_assoc();
    	
    	if(isset($result['course_ID']) && !empty($result['course_ID'])){
    		return true;
    	}else{
    		return false;
    	}
    }

}