<?php

include 'dbcon.php';

session_start();


 if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['pass'];  
  
    $check_user="select * from applicantreg WHERE email='$user_email' AND password='$user_pass'";  
  
    $run=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        header ('applicantdashboard.php');
  
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
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
        <label>Email Id</label>
        <input type="email" name="email" placeholder="Enter Email">
      </div>   

      <div class="input-group">
        <label>Password.</label>
        <input type="text" name="pass" placeholder="Enter Your Password">
      </div>

    
		
        <button  class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="login"> </button>
    <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login" > 
	
	<div class="form-group">
	<div class="col-sm-offset-3">
      <p> You don't have an account with us <a href="applicantreg.php"> Register Account here </p>
       
      </div>
   </div>
  </form>


 
  
  </div>
   
</body>
</html>