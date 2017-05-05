<!Doctype html>


<html>

    <head>
    
    
    </head>
    
    
    <body>
    
         <form id="form_datas" method="post" enctype="multipart/form-data">
            ExamID: <input type="text" name="exam" id="examTitle"placholder="exam title" /><br/>
           <input type="submit" value="Update" id="update"/> <a href="Preliminary_Data.php"><input type="button" value="Back" id="sub"/></a> 
         
        </form> 
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            var form = $("#form_datas");
            var fromd = form.serialize();
            var path = "update_handler.php";
                
            $('#examTitle').mouseover(function(){
                $('#update').attr('enabled','enabled');
                $('#update').removeAttr('disabled');
            });
            $("#form_datas").on("submit",function(e){
                e.preventDefault();
                var formData = new FormData($(form)[0]);
            $.ajax({
                url: path,
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(data){
                    $("#feedBack").html(data);
                    $("#feedBack").fadeIn(800).fadeOut(4000);
                   $("#form_datas").get(0).reset();
                    $('#update').attr('disabled','disabled');
                    //$('#cont').fadeIn(1000);
                }
                
            });
                });
         }); //needs to minify this
         
     
        </script>
        <div id="feedBack"></div><a href="Questions.php" ><input type="button" value="continue" id="cont" style="display:none;"/></a>
    </body>

</html>