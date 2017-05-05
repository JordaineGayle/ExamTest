<!DOCTYPE html>
<?php
    
    session_start();

    require ("../../configuration/config.php");
    
    
    
    class Exam extends configuration{
    
        public $ans_sql,$opt_sql,$quest_sql,$ExamID,$counter;
     
        
        public function Sql_Runner(){
            $this->counter = 0; 
            
            $this->ExamID = $_SESSION['Exam'];
            
            
            
            $this->opt_sql = "SELECT * FROM options WHERE ExamID='$this->ExamID'";
            
            $this->quest_sql = "SELECT * FROM questions WHERE ExamID='$this->ExamID'";
            
           
            $raw2 = $this->connect->query($this->opt_sql);
            $raw3 = $this->connect->query($this->quest_sql);
?>

<html>

    <head>
    
        <title>Exam</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
        <style type="text/css">
        
            li{
                list-style: lower-alpha;
            }
            
            body{
                
            }
            
            form{
                height: 100%;
  overflow: hidden;
                height:150px;
                width: 100%;
            }
        .loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/colload.gif') 50% 50% no-repeat rgb(249,249,249);
    background-color: #262729;
}
            
            .loader p {
                position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
            }
        </style>
    
    </head>
    
    <body>
        <div class="loader"></div>
        <script type="text/javascript">
            $('document').ready(function(){
                 $(window).load(function() {
	setTimeout(function(){
           $(".loader").fadeOut(5000);
        },5000);
});
            });
            
        

</script>
        
    <p id="time">Exam Duration: 45 Mins&nbsp;&nbsp; &nbsp;Exam Rules:<input type="button" id="readRule" value="Rules" /> </p>
        
        
        
        
    <form id="form_data" enctype="multipart/form-data" method="post">
        <?php
            while($rawres2 = $raw2->fetch_assoc() and $bill = $raw3->fetch_assoc()){
                
                $Option1 = $rawres2['Option1'];
                $Option2 = $rawres2['Option2'];
                $Option3 = $rawres2['Option3'];
                $Option4 = $rawres2['Option4'];
                $qID = $rawres2['QuestID'];  
                $Questions = $bill['Questions'];
                $this->counter++;
                //unset($_SESSION['questNum']);
                //session_destroy($_SESSION['questNum']);
        ?>
        
        <h3 class="<?php echo $qID; ?>"><?php echo $this->counter.". ".$Questions ?></h3>
        <ol>
            
            <li class="<?php echo $qID; ?>"  ><input type="radio" name="<?php echo $qID; ?>"  class="<?php echo $qID; ?>"  id="" onclick="Executor(this,<?php echo $qID; ?>);" value="<?php echo $Option1; ?>" /><?php echo $Option1; ?></li>
            <li class="<?php echo $qID; ?>"  ><input type="radio" name="<?php echo $qID; ?>" class="<?php echo $qID; ?>"  id="" onclick="Executor(this,<?php echo $qID; ?>);"   value="<?php echo $Option2; ?>" /><?php echo $Option2; ?></li>
            <li class="<?php echo $qID; ?>"  ><input type="radio" name="<?php echo $qID; ?>"  class="<?php echo $qID; ?>" id=""  onclick="Executor(this,<?php echo $qID; ?>);" value="<?php echo $Option3; ?>" /><?php echo $Option3; ?></li>
    <li class="<?php echo $qID; ?>"  ><input type="radio" name="<?php echo $qID; ?>" class="<?php echo $qID; ?>"  id="" onclick="Executor(this,<?php echo $qID; ?>);"  value="<?php echo $Option4; ?>" /><?php echo $Option4; ?></li>
            
        </ol>
           


<?php
            }}}
?>
     


<?php
        if(isset($_SESSION['Exam']) && !empty($_SESSION['Exam'])  && isset($_SESSION['student']) && !empty($_SESSION['student']) && !empty($_SESSION['TempExamID']) && isset($_SESSION['TempExamID'])){
            $servername = "localhost";
$username = "BOB";
$password = "";
$dbname = "bob";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
            $ExamID = $_SESSION['Exam'];

            $queri = $conn->query("SELECT `ExamID` FROM `pre_data` WHERE `ExamID`='$ExamID' ");
		      //$check = $query->fetch_assoc();
                
                if(1 == mysqli_num_rows($queri)){
                    
                    $ok = new Exam();

                    $ok->Sql_Runner();
                    
                }else{
            echo "Exam Doesn't Exist!";
                 session_destroy();   

}
}else{
            header("Location: endExam.php");
        }
?>
    <div><p id="res"></p></div>
    <input type="submit" id="sub" value="Mark Exam"/>
   <div><p id="res"></p></div>
         </form>
         <a href="endExam.php" id="endlink" style="display:none"><input type="submit" id="des" value="Finish Exam"/></a>
        <!--<script src="tesla.js"></script>-->
        <script>
            
            $('document').ready(function(){
                
                var rules = "Exam Rules, I am Mark and I will be your invigilator for all exams,"+
                    "Rule 1 No cheating, if a student is caught cheating he or she will get disqualified,"+
                    "Rule 2 Once a question is answered it cannot be changed,"+
                    "Rule 3 Please answer the questions in the order is was given,"+
                   "Rule 4 If the count down reaches zero the exam will automatically be marked and you will be logged out.";
                
                    function speaker(data){
                responsiveVoice.speak(data, "UK English Male");
                }
                
                
                $('#readRule').click(function(){
                    speaker(rules);
                })
                
             
                
            });
        
            function Executor(id,idm){
                var phpRequestID = $(id).val();
                
                var  ls =  $(id).attr('class');
                var  l =  $(id).attr('value');
                $("."+idm).attr('disabled','disabled');
                $("."+idm).fadeOut(600);
                var paths = "inloder.php";
                $.post(paths, {idms:l,quest:ls},function(data){
                    $('#res').html(data);
                    //$('#res').fadeIn(600).fadeOut(100);
              });
        
            }
                var path = "exam_handler.php";
                var form = $('#form_data');
                var fromd = form.serialize();
            
            
            $('#form_data').on("submit",function(e){
                
                e.preventDefault();
                $('#sub').fadeOut(1000);
                $('#endlink').fadeIn(1000);
                var formData = new FormData($(form)[0]);
                $('#res').html('<img src="img/ajax.gif"/>');
            setTimeout(function(){
                $.ajax({
                url: path,
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function(data){
                    $('#res').html(data);
                }
                
            });
            },3000);
                });
                
            
            
                
        </script>
         
    </body>
    

</html>
