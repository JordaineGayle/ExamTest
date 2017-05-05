<?php
 require "classes/config.php";
 require "classes/classData.php";
 $course_image = new classroom;
 

$target_dir = "classes/uploads/";
$target_file = $target_dir . basename($_FILES["awesomefile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
//file name format 
 $newfile = $target_dir.rand(100,9999)."-COSIMG.".$imageFileType;

// Check file size
if ($_FILES["awesomefile"]["size"] > 5000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" ) {
    echo "Sorry, only mp4 file allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["awesomefile"]["tmp_name"], $newfile)) {
        echo "Your file has been uploaded successfully";
		
		echo $course_image->course_image($newfile);
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}