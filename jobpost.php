<?php 
    include 'dbcon.php';
	//session_start();
	
   //$edit = $_GET['edit'];
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM postjob WHERE id=$id";
		$record = mysqli_query($dbcon, $sql); 

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$companyname = $n['companyname'];
			$jobtitle = $n['jobtitle'];
			$payrate = $n['payrate'];
			$address = $n['address'];
			$jobduties = $n['jobduties'];
			$worktype = $n['worktype'];
			
	   
		}
	}   

	// initialize variables
	    $companyname = "";
	    $jobtitle = "";
		$payrate = "";
		$address = "";
		$jobduties = "";
		$worktype = "";
	    $id = 0;
	    $update = false;
		
	if (isset($_POST['save'])) {
		$companyname = $_POST['companyname'];
		$jobtitle = $_POST['jobtitle'];
		$payrate = $_POST['payrate'];
		$address = $_POST['address'];
		$jobduties = $_POST['jobduties'];
		$worktype = $_POST['worktype'];
		

		mysqli_query($dbcon, "INSERT INTO postjob (companyname, jobtitle, payrate, address, jobduties, worktype ) 
		                             VALUES ('$companyname', '$jobtitle', '$payrate', '$address', '$jobduties', '$worktype')"); 
		$_SESSION['message'] = "Job saved"; 
		header('location: jobpost.php');
	}


	if (isset($_POST['update'])) {
	    $id = $_POST['id'];
	    $companyname = $_POST['name'];
		$jobtitle = $_POST['jobtitle'];
		$payrate = $_POST['payrate'];
		$address = $_POST['address'];
		$jobduties = $_POST['jobduties'];
		$worktype = $_POST['worktype'];
	

	mysqli_query($dbcon, "UPDATE postjob SET companyname='$companyname', jobtitle='$jobtitle',
                        	payrate='$payrate', address='$address' , jobduties='$jobduties', worktype='$worktype', WHERE id=$id");
	$_SESSION['message'] = "Job updated!"; 
	header('location: jobpost.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($dbcon, "DELETE FROM postjob WHERE id=$id");
	$_SESSION['message'] = "Job deleted!"; 
	header('location: jobpost.php');
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
<?php include 'dbcon.php';

 if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


	
	
	<?php $sql= "SELECT * FROM postjob" ;
	 $results = mysqli_query($dbcon,$sql); ?>
		
	
		<?php while ($row = mysqli_fetch_array($results)) { ?>
		
	
	<form method="post" action="jobpost.php" >
	
	<input type="hidden" name="edit" value="<?php echo $id; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Company Name</label>
			<input type="text" name="companyname" value="<?php echo htmlentities($row['companyname']); ?>">
		</div>
		<div class="input-group">
			<label>Job Title/Position</label>
			<input type="text" name="jobtitle" value="<?php echo htmlentities($row['jobtitle']); ?>">
		</div>
		<div class="input-group">
			<label>Pay Rate</label>
			<input type="text" name="payrate" value="<?php echo htmlentities($row['payrate']); ?>">
		</div>
		<div class="input-group">
			<label>Work Address</label>
			<input type="text" name="address" value="<?php echo htmlentities($row['address']); ?>">
		</div>
		<div class="input-group">
			<label>Job Duties</label>
			<input type="textarea" name="jobduties" value="<?php echo htmlentities($row['jobduties']); ?>">
		</div>
		<div class="input-group">
		<label> Work Type: </label>
			<select name="worktype" id="" value="<?php echo htmlentities($row['worktype']); ?>">
					<option>Full Time</option>
					<option>Remote </option>
				</select>
				<?php } ?>
														
		<div class="input-group">
			<?php if ($update == true): ?>
	      <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
        <?php else: ?>
	      <button class="btn" type="submit" name="save" >POST JOB</button>
       <?php endif ?>   	
		</div>
			
	</form>

</body>

</html>


