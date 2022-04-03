<?php 
    include 'dbcon.php';
	//session_start();
	

	if (isset($_POST['save'])) {
		$companyname = $_POST['companyname'];
		$jobtitle = $_POST['jobtitle'];
		$payrate = $_POST['payrate'];
		$address = $_POST['address'];
		$jobduties = $_POST['jobduties'];
		$worktype = $_POST['worktype'];
		

		$sql = "INSERT INTO postjob (companyname,jobtitle, payrate, address, jobduties, worktype ) 
		                                VALUES ('$companyname', '$jobtitle', '$payrate', '$address', '$jobduties', '$worktype')"; 
		$_SESSION['message'] = "Job saved"; 
		
		
		  if (mysqli_query($dbcon,$sql)) {
                echo "JobPost successfully";
				
            }
        else {
       
            echo "Failed to PostJob.";
	}
        
	}		

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Job</title>
</head>
<style>
body {
    font-size: 19px;
}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
tr:hover {
    background: #F5F5F5;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
</style>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


	<form method="post" action="postjob.php" >
        <center> <h3> POST JOB </h3> </center>
		<div class="input-group">
			<label>Company Name</label>
			<input type="text" name="companyname" value="">
		</div>
		<div class="input-group">
			<label>Job Title/Position</label>
			<input type="text" name="jobtitle" value="">
		</div>
		<div class="input-group">
			<label>Pay Rate</label>
			<input type="text" name="payrate" value="">
		</div>
		<div class="input-group">
			<label>Work Address</label>
			<input type="text" name="address" value="">
		</div>
		<div class="input-group">
			<label>Job Duties</label>
			<input type="textarea" name="jobduties" value="">
		</div>
		<div class="input-group">
		<label> Work Type: </label>
			<select name="worktype" id="" value="">
					<option>Full Time</option>
					<option>Remote </option>
				</select>
				</div> 
				<center>
		<div class="input-group">
		
	      <button class="btn" type="submit" name="save" >POST JOB</button>
                
		</div> </center>
	</form>
</body>
</html>


