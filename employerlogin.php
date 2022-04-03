<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Demo</title>
	<style>
		h1 {
			color: green;
		}
		.container {
			padding: 15px;
			width: 400px;
		}
        .crimson{
            color : rgb(255, 190, 68);

        }
		
		label,
		input {
			margin-bottom: 10px;
		}
		
		button {
			float: right;
			margin-right: 10px;
			background-color: green;
		}
	</style>
</head>

<body>
	<center>
		<h1>Mosh-Tech Login</h1>
		
		<br><br>
		<div class="container">
		<form method="POST" action="employerlogin.php">
			<div>
				<label>Company Name:</label>
				<input type="text" name="companyname" id="e1" size="40">
              
			</div>
			
			<div>
				<label>Password:</label>
				<input type="text" name="pass"
					id="p1" size="40">
				
			</div>
			
			<button type="submit" name="emp_login">
				Submit
			</button>
            <span id="error"></span>
		</div>
	</center>
</body>
<script>
	function errorMessage() {
        var e=document.getElementById("e1").value;  
    var p=document.getElementById("p1").value;  
    
		var error = document.getElementById("error");

        
    //Code for password validation  
    var letters = /^[A-Za-z]+$/;  
            var email_val = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
    //other validations required code  
    if(e==''||p==''){  
        error.innerHTML = "<span style='color: red;'>"+
						"Username and password both failed to meet requirement</span>"
    }  

 
	}
</script>

</html>					

<?php  

include("dbcon.php");  

session_start();
  
if(isset($_POST['emp_login']))//this will tell us what to do if some data has been post through form with button.  
{  
    $emp_name=$_POST['companyname'];  
    $emp_pass=$_POST['pass'];  
  
    $emp_query="select * from employerreg where companyname='$emp_name' AND password='$emp_pass'";  
  
    $run_query=mysqli_query($dbcon,$emp_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
  
        echo "<script>window.open('employerdashboard.php','_self')</script>";  
    }  
    else {echo"<script>alert('Employer Details are incorrect..!')</script>";}  
  
}  
  
?>