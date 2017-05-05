<html>
    <script type="text/javascript" src="/simms/coach/js/sizeValidation.js"></script>
   <form id="formd" method="post" novalidate="novalidate" enctype="multipart/form-data" >
        <input type="file" name="file" id="file" accept="application/pdf"/><br/><br/>
        <input type="submit" id="sub" name='submit' style="cursor:pointer" value="submit" />
    </form>
       
    <progress id="prog" max="100" value="0" style="display:none;"></progress>
    <div id="here"></div>
    
    <script>
           
        $(document).ready(function(){
            
            
            
            

            var files = $('#file').attr('name');
            var form = $('#formd');
            var fromd = form.serialize();
            
            var path = '/simms/coach/classes/Upload.php';
            
            
            $('#formd').on("submit",function(e){
                
                e.preventDefault();
                var formData = new FormData($(form)[0]);
            $.ajax({
                url: path,
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function(data){
                    $('#file').replaceWith($('#file').val('').clone(true));
                    $('.results').html(data);
                }
                
            });
                });
         }); //needs to minify this
         
     
    </script>
    


<p class="gets"></p>
<p class="results"></p>
</html>

