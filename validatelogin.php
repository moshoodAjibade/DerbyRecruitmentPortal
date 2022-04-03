<?php

include 'dbcon.php';

session_start();


  if($_SESSION['Employer_login']=='')
  {
     header('location:employerdashboard.php');
  }
  if($_SESSION['Applicant_login']=='')
  {
     header('location: applicantdashboard.php');
  }
  
  if(isset($_POST["submitlgn"]))
  {
      $email=$_POST["email"];
      $pass=$_POST["pass"];
	  $role = $_POST["user_role"];
	  
	  if (empty($email)){
		  $errorMsg[]="Please Enter Your Email";
	  }
	  if (empty($pass)){
		  $errorMsg[]="Please Enter Your Password";
	  }
      if (empty($role)){
		  $errorMsg[]="Please Enter Your User Role";
	  }
	  
      $sql=mysqli_query($con,"select * from registration where email='$email' and pass='$pass'");
      if(mysqli_num_rows($sql))
      {
          while($row=mysqli_fetch_array($sql))
          {   
	       
              
			  $dbemail=$row["email"];
			  $dbpass=$row["pass"];
			  $dbrole=$row["user-role"];
              
              session_start();
			  $dbemail=$row["email"];
			  $dbpass=$row["pass"];
			  $dbrole=$row["user-role"];
              
             switch($dbrole){
				 case "Employer":
				 $_SESSION["Employer_Login"]=$email;
				 $loginMsg ="Employer Successful Login";
				 header ("location:employerdashboard.php");
				 break;
				 
				  case "Applicant":
				 $_SESSION["Applicant_Login"]=$email;
				 $loginMsg ="Applicant Successful Login";
				 header ("location:applicantdashboard.php");
				 break;
				 
				 default:
				 $errorMsg[] =" Wrong Login Details";
				 }
              
          }
        
      }
      else{
         //$error="";
         echo '<script>alert("plz inter valid password");</script>';


      }


  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.container{
    width: 100%;
    height: 100vh;
    background: #141a34;
    display: flex;
    align-items: center;
    justify-content: center;
}

.useful-links{
    position: absolute;
    top: 5%;
    right: 5%;

}
.useful-links a{
    display: block;
    color: #fff;
    text-decoration: none;
}

.container form{
    width: 90%;
    max-width: 500px;
    padding: 50px 30px 20px;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    position: relative;
}
.fa-paper-plane{
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #fff;
    font-size: 26px;
    padding: 20px;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.input-group{
    width: 100%;
    display: flex;
    align-items: center;
    margin: 10px 0;
    position: relative;
}
.input-group label{
    flex-basis: 28%;
}
.input-group input, .input-group textarea{
    flex-basis: 68%;
    background: transparent;
    border: 0;
    outline: 0;
    padding: 10px 0;
    border-bottom: 1px solid #999;
    color: #333;
    font-size: 16px;
}
::placeholder{
    font-size: 14px;
}

form button{
    background: #141a34;
    color: #fff;
    border-radius: 4px;
    border: 1px solid rgba(255, 255, 255, 0.7);
    padding: 10px 40px;
    outline: 0;
    cursor: pointer;
    display: block;
    margin: 30px auto 10px;
}

</style>
<body>
  <div class="container">
    <form>
      <i class="fas fa-paper-plane"></i>

      <div class="input-group">
        <label>Full Name</label>
        <input type="text" name="user" placeholder="Enter your name">
      </div>
	  
	    <div class="input-group">
        <label>Email Id</label>
        <input type="email" name="email" placeholder="Enter Email">
      </div>   

      <div class="input-group">
        <label>Password.</label>
        <input type="text" name="pass" placeholder="Enter Your Password">
      </div>

    

	        <div class="input-group">
      <label>Select Role</label>
	  <select class="form-check-input" name ="user_role" type="select" id=""> 
            <option  value="" selected="selected" >--Select User Role</label>
			 <option  value="Employer" >Employer</label>
			  <option  value="Applicant" >Applicant</label>
			
			</select>
        </div>
		

    <button name="submitlgn">Submit</button>
	
	<div class="form-group">
	<div class="col-sm-offset-3">
      <p> You don't have an account with us <a href="registration.php"> Register Account here </p>
       
      </div>
   </div>
  </form>


 
  
  </div>
   
</body>
</html>