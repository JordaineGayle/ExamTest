<?php
session_start();
require "../../classes/config.php";

class extention extends configuration {
	public $name,$account,$email,$address;
	
	public function general($string) {
		$query = $this->connect->query("SELECT `fname`,`lname`,`Account`,`email`,`address_1` FROM `users` WHERE `Account`='$string' ");
		$result = $query->fetch_assoc();
		$this->name = $result['fname'].' '.$result['lname'];
		$this->account = $result['Account'];
		$this->email = $result['email'];
		$this->address = $result['address_1'];
		
		}
		
	public function checkAuthorization($identifier){
		$query = $this->connect->query("SELECT `Authorization` FROM `users` WHERE `Account`='$identifier' ");
		$result = $query->fetch_assoc();
		
		if(isset($result['Authorization']) && !empty($result['Authorization'])){
			return true;
			}else{
				return false;
				}
		}	
	}

$check = $_POST["collect"];
$subject = $_POST['subject'];
$ext = new extention;

$ext->general($_SESSION["account"]);
switch ($check){
	case "general":
	
	?>
    <div style="background-image:url('https://bytesizemoments.com/wp-content/uploads/2014/04/placeholder3.png');width:250px;height:200px;float:left; background-position:center">
    
    </div>
    <div id="info" style="float:left;width: 648px;margin:0 20px">
    	<table>
        <h1>Profile</h1>
        	<tr>
            	<td align="right">Full Name:</td>
                <td align="left"><?php echo $ext->name;?></td>
            </tr>
            <tr>
            	<td align="right">Address</td>
                <td align="left"><?php  echo $ext->address;?></td>
            </tr>
            <tr>
            	<td align="right">email:</td>
                <td align="left"><?php echo $ext->email;?></td>
            </tr>
            <tr>
            	<td align="right">Account Number:</td>
                <td align="left"><?php echo $ext->account;?></td>
            </tr>
            <tr>
            	<td align="right">Level</td>
                <td align="left">N/A</td>
            </tr>
            <tr>
            	<td align="right"></td>
                <td align="left"></td>
            </tr>
        </table>
        <a class="button" onclick="UpdateProfileInfo()">edit</a>
    </div>
    
    <script>
    	function UpdateProfileInfo() {
			$("#main").css("height","550px");
			$.post("classes/extention.php",{collect:"generalEdit"},function(data){
				$("#info").html(data);
				
				});
			}
    </script>
		
	<?php
	
	break;
	
	case "generalEdit":
	
	?>
    
    <div id="info" style="float:left;width: 648px;margin:0 20px">
    	<table>
        <h1>Profile</h1>
        	<tr>
            	<td align="right">Account Number:</td>
                <td align="left"><input type="text" disabled value="<?php echo $ext->account;?>"></td>
            </tr>
        	<tr>
            	<td align="right">Full Name:</td>
                <td align="left"><input type="text" name="fname" placeholder="First Name"><input type="text" name="lname" placeholder="Lastname" /></td>
            </tr>
            <tr>
            	<td align="right">email:</td>
                <td align="left"><input disabled type="text" value="<?php echo $ext->email;?>"></td>
            </tr>
            <tr>
            	<td align="right">Street Address</td>
                <td align="left"><input type="text" placeholder="eg 1 Bogue Road" name="street"></td>
            </tr>
            <tr>
            	<td align="right">City</td>
                <td align="left"><input type="text" placeholder="eg Montego Bay" name="city"></td>
            </tr>
            <tr>
            	<td align="right">Country</td>
                <td align="left"><select name="country">
                	<option value="Jamaica">Jamaica</option>
                	</select></td>
            </tr>
            <tr>
            	<td align="right">Phone Number</td>
                <td align="left"><input type="text" name="phone" placeholder="(876) 331 7937"></td>
            </tr>
            <tr>
            	<td align="right">Upload a Profile Picture</td>
                <td align="left"><input type="file" name="profileImage"></td>
            </tr>
        </table>
        <a class="button" onclick="UpdateProfileSave()">Save</a>
    </div>
    
    <script>
	
	function UpdateProfileSave(){
		
		var fname = $("input[name=fname]").val();
		var lname = $("input[name=lname]").val();
		var street = $("input[name=street]").val();
		var city = $("input[name=city]").val();
		var country = $("select[name=country]").val();
		var phone = $("input[name=phone]").val();
		
		$("#main").css("height","250px");
		$.post("classes/updateprofile.php",{fname:fname,lname:lname,street:street,city:city,country:country,phone:phone},function(data){
			$("#info").html(data);
			});
		}
    		
    </script>
		
	<?php
	
	break;
	
	case "security":
		
		?>
			<table>
        	<tr>
            	<td align="right">Current Password:</td>
                <td align="left"><input type="password" name="currentPassword"></td>
            </tr>
        	<tr>
            	<td align="right">New Password:</td>
                <td align="left"><input type="password" name="newPassword"></td>
            </tr>
            <tr>
            	<td align="right">Retype Password:</td>
                <td align="left"><input type="password" name="verifyPassword"></td>
            </tr>
            </table>
            <a class="loginButton" onClick="updatePassword('<?php echo $_SESSION["account"];?>')">Update</a>
		<?php
		
	break;
	
	case "addCourseEdit":
	$verification = $ext->checkAuthorization($_SESSION["account"]);
	if($verification == true){
		
		?>
        <h2>Please fill out the form below as it relates to the Course</h2>
        <div id="setCourse">
        <table style="text-align:center">
        	<tr>
        		<td>Subject</td>
                <td><input type="text" name="course_tite" disabled value="<?php echo $subject;?>"></td>
        	</tr>
        	<tr>
            	<td>Aims of the Course</td>
                <td>How many Aims are within this Course?<input type="number" style="width:30px" name="aimNumber" maxlength="2"></td>
            </tr>
            <tr>
            	<td>Course Syllabus</td>
                <td>How many sections are within this syllabus? <input type="number" name="syllNumber" style="width:30px" maxlength="2"></td>
            </tr>
            <tr>
            	<td>Days available</td>
                <td>Monday:<input type="checkbox" id="days" value="Mon"><br />
                Tuesday: <input type="checkbox" id="days" value="tue" /><br />
                Wednesday: <input type="checkbox" id="days" value="wed" /><br />
                Thursday: <input type="checkbox" id="days" value="thur" /><br />
                Friday: <input type="checkbox" id="days" value="wed" /><br /> </td>
            </tr>
            <tr>
            	<td>Time Frame</td>
                <td>10:00 AM - 12:00 PM<input type="checkbox" id="timeFrame" value="10:00 AM - 12:00 PM"><br />
                12:00 PM - 2:00PM <input type="checkbox" id="timeFrame" value="12:00 PM - 2:00PM" /><br />
                2:00PM - 4:00PM <input type="checkbox" id="timeFrame" value="2:00PM - 4:00PM" /><br />
                4:00PM - 6:00PM <input type="checkbox" id="timeFrame" value="4:00PM - 6:00PM" /><br />
                6:OOPM - 8:00PM <input type="checkbox" id="timeFrame" value="6:OOPM - 8:00PM" /><br />
                8:OOPM - 10:00PM <input type="checkbox" id="timeFrame" value="8:OOPM - 10:00PM" /><br /> </td>
            </tr>
            <td>
            	<td></td>
                <td><a class="button" onclick="createCourse()">Create Course</a></td>
            </td>
        </table>
        </div>       
        <script>
        	function createCourse() {
				var aim = $("input[name=aimNumber]").val();
				var syllNumber = $("input[name=syllNumber]").val();
				var daysArray = new Array(); 
				var timeArray = new Array();
				 $("#days:checked").each(function(){
					 var variable = $(this).val();
					 daysArray.push(variable);
					});
				 $("#timeFrame:checked").each(function() {
                    var timeVariable = $(this).val();
					timeArray.push(timeVariable);
                });	
					days = daysArray.toString();
					times = timeArray.toString();
								
				$.post("classes/courseScripts.php",{aim:aim,syllNumber:syllNumber,daysArray:days,timeArray:times,course_Title:"<?php echo $subject;?>"},function(data){
					$("#setCourse").html(data);
				});
			}	
        </script> 
		<?php
		
		}else{
			?><a style='color:red'>You are not an authorized coach of Simms Online Academy, Please Contact your Supervisor for clearance. </a><?php ;
			}
	
	break;
	
	case "addCourseView":
	?>
		
	<?php
	break;
	
	default:
	
	}