<?php

    class File_Upload{
        public $name,$files,$tmp_name,$move_dir,$target_dir,$target_file,$FileType,$size;
        
        
        public function Uploading(){
            $this->name = $_FILES['file']['name'];
            $this->tmp_name = $_FILES['file']['tmp_name'];
            echo "<script src='/simms/coach/js/file.js'></script>";
            $this->size = $_FILES['file']['size'];
            $this->Uploading_PDF_File_To_Server();
            
        }
        
        public function Uploading_PDF_File_To_Server(){
            
            if(isset($this->name) == true){
                if(!empty($this->name)){
                     $this->BaseName();
                    if(!($this->size > 3000000) ){
                        
                    
                    if($this->FileType == 'pdf'){
                        
                        $this->Checking_For_Files($this->target_file);
                        
                        $fileOnServer = $this->files;
                        if($fileOnServer == false){
                        
                        $this->Move_PDF_Files_To($this->tmp_name,$this->target_file);
                        
                        $PDF_FILE = $this->move_dir;
                        
                        if($PDF_FILE == true){
                            echo "<p class='fading'>File Uploaded Successfully!</p>";
                            
                        }else{
                            echo "<p class='fading'>File Upload Failed</p>";
                        }
                        }else{
                            echo "<p class='fading'>Please Rename the file its already been uploaded</p>";
        
                        }
                    }else{
                        echo "<p class='fading'>Only PDF files are allowed!</p>";
                    }
                }else{
                     echo "<p class='fading'>You have exceeded the filesize Limit of 3MB!</p>";   
                }
                    
                }else{
                    echo "<p class='fading'>Please Select a File to Upload</p>";
                }
            }else{
                echo "<p class='fading'>Still Requesting Data</p>";
            }
        }
        
        public function Move_PDF_Files_To($tname,$loc){
            $this->move_dir = move_uploaded_file($tname,$loc);
        }
        
        public function BaseName(){
            $this->target_dir = "uploads/";
            $this->target_file = $this->target_dir.basename($this->name);
            $this->FileType = pathinfo($this->target_file,PATHINFO_EXTENSION);
        }
        
        public function Checking_For_Files($file_string){
            $this->files = file_exists($file_string);
        }
             
                                          
        
    }

    $Loading = new File_Upload();
    $Loading->Uploading(); 
    
?>
