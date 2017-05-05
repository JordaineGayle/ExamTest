<?php

    class File_Upload{
        public $name;
        public $extension;
        public $type;
        public $files;
        public $filess;
        public $size;
        public $tmp_name;
        public $location;
        public $move_dir;
        
        public function Uploading(){
            $this->name = $_FILES['file']['name'];
            $this->extension = strtolower(substr($this->name, strpos($this->name, '.') + 1));
            $this->type = $_FILES['file']['type'];
            $this->tmp_name = $_FILES['file']['tmp_name'];
            $this->size = $_FILES['file']['size'];
            $this->Uploading_PDF_File_To_Server();
        }
        
        public function Uploading_PDF_File_To_Server(){
            echo " <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>";
            echo "<script src='/simms/coach/js/file.js'></script>";
            if(isset($this->name) == true){
                if(!empty($this->name)){
                    
                    if($this->extension == 'pdf'){
                        $this->location = 'C:/xampp/htdocs/simms/coach/Transcripts/pdfs/pdfFiles/';
                        
                        $this->Checking_For_Files($this->location,$this->name);
                        
                        $fileOnServer = $this->files;
                        if($fileOnServer == false){
                        
                        $this->Move_PDF_Files_To($this->tmp_name,$this->location,$this->name);
                        
                        $PDF_FILE = $this->move_dir;
                        
                        if($PDF_FILE == true){
                            echo "<p class='marl'>File Uploaded Successfully!</p>";
                            
                        }else{
                            header('classroomData');
                            echo "<p class='marl'>File Upload Failed</p>";
                        }
                        }else{
                            echo "<p class='marl'>Please Rename the file its already been uploaded</p>";
        
                        }
                    }else{
                        echo "<p class='marl'>Only PDF files are allowed!</p>";
                    }
                    
                }else{
                    echo "<p class='marl'>Please Select a File to Upload</p>";
                }
            }else{
                echo "<p class='marl'>Still Requesting Data</p>";
            }
        }
        
        public function Move_PDF_Files_To($tname,$loc,$fname){
            $this->move_dir = move_uploaded_file($tname,$loc.$fname);
        }
        
        public function Checking_For_Files($path_string,$file_string){
            
            $this->files = file_exists($path_string."".$file_string);
            
            if($this->files){
            
            }else{
                
            }
        }
                                          
        
    }

    $Loading = new File_Upload();
    $Loading->Uploading(); 
    
?>