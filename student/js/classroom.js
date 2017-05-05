    function selectSubject(course_ID){
        
        $.post('handler/master_handler.php',{subject_ID:course_ID},function(data){
            $("#main").html(data);
        });
    }
    
    function getVideo(){
        $.post('../handler/master_handler.php',{classVideoHandle:'video'},function(data){
            
        });
    }