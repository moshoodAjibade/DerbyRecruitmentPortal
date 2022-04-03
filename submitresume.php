<?php 

include 'dbcon.php';


if(isset($_REQUEST["submit"]))
{

    $firstname=$_POST['firstname']; 
    $lastname=$_POST['lastname'];
    $email=$_POST['email']; 	
	$gender=$_POST['gender'];
	$phone=$_POST['phone']; 
    $address=$_POST['address']; 
    
	
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="cv/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","pdf","wmv","pdf","zip");
	if(in_array($ext,$allowed))
	{
 move_uploaded_file($tmp_name,$path);
 mysqli_query($dbcon,"insert into jobapplication (firstname,lastname,email,gender,phone,address,file )
                            values('$firstname','$lastname','$email','$gender','$phone','$address','$file')");	
							
						echo "File uploaded successfully";
			
						
}
}
?>

<html>
<head></head>
<body>
<div class="container-fluid">
	<form enctype="multipart/form-data" method="post" action="submitresume.php">
		<input type="hidden" name="id" value="">
		<input type="hidden" name="position_id" value="<?php #echo $_GET['id'] ?>">
	<div class="col-md-12">
		<div class="row">
			<h3>Application Form for </h3>
		</div>
		<hr>
		<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label"> First Name</label>
				<input type="text" class="form-control" name="firstname" required="">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Last Name</label>
				<input type="text" class="form-control" name="lastname" required="">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label">Email</label>
				<input type="email" class="form-control" name="email" required="">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Gender</label>
				<select name="gender" id="" class="custom-select browser-default">
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>
			
			<div class="col-md-4">
				<label for="" class="control-label">Phone No</label>
				<input type="text" class="form-control" name="phone" required="">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-7">
				<label for="" class="control-label">Address</label>
				<textarea name="address" id="" cols="30" rows="3" required class="form-control"></textarea>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="input-group col-md-4 mb-3">
				<div class="input-group-prepend">
			    <span class="input-group-text" id="">Resume</span>
			  </div>
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" id="file" onchange="" name="file" >
			    <label class="custom-file-label" for="resume">Choose file</label>
			  </div>
			  <br><br>
			  <div class="col-md-4">
				
				<input type="button" value="submit" name="submit" required="">
			</div>
			</div>
		</div>
	</div>
	</form>
</div>

</body>
</html>