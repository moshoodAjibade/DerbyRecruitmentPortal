<?php 
    include("dbcon.php");
 
  session_start();

  extract($_POST);
  
   
     
 if(isset($changepass)) {
	 $opassword=$_POST['oldpassword'];
     $npassword=$_POST['newpassword'];
	 $cpassword=$_POST['confirmpassword'];
 	$user_email=$_SESSION["email"];
	 
	$que=mysqli_query($dbcon,"select Password from applicantreg where password='$opassword' && id='$id'");
	$row= mysqli_fetch_array($que);

	 if($row>0) {
		
		mysqli_query($dbcon,"update applicantreg set password='$npassword' where id='$id'");
		
		$err="<font color='green'>Password Updated Successfully !</font>";
	
		
	 }
	    else
	 {
	    $err="<font color='red'>Old Password doesn't match</font>";
	 }
 
 }
 

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="../../favicon.ico">
 
 <!-- http://draganzlatkovski.com/code-projects/toggle-jquery-side-bar-menu-in-bootstrap-free-template/ -->
 
 <title>Job Post Pannel</title>
 
 <!-- jQuery -->
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="components/bootstrap/dist/js/jquery.js"></script>
 
  
 
 <!-- Bootstrap core CSS -->
 <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
 <link href="components/bootstrap/dist/css/simple-sidebar.css" rel="stylesheet">
  <link href="components/bootstrap/dist/css/postmodal.css" rel="stylesheet">
  <link href="components/bootstrap/dist/css/fbbox.css" rel="stylesheet">

 

 

 
 
</head>

<body>
 
 
 


 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
  
  
    <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">HelpEachOther </label>
    <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">Hello! <font style="font-size:13px"> <?php echo $_SESSION["name"]; ?></font> </label>


  
    


 
 </div>
 </nav>
 
 
 
 <!--
<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Post Task</button></div>
-->

 


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">What's your Task?</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			  <form action="" method="post" enctype="multipart/form-data">

			   						
              <div class="form-group">
                <label for="exampleInputEmail1">Task Title</label>
                <textarea   name="status_title" class="form-control" placeholder="eg:need a cleaner"></textarea>
                  
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Describe your task in more detail</label>
         <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="status" required></textarea>
                                </div>
                            </div>
                                          </div>

		
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="submit" name="submit"  class="btn btn-default btn-hover-green" value="Post">Post</button>
				</div>
			</div>
		</div>
	
		

					

		</div>
		

		
	</div>
  </div>
</div>

  		</form>
 
 
 
 

  
  <!-- this is div for user post -->
<div class="fluid-container">
<div class="row" style="clear:both">
 <div class="col-lg-12">
 	    <div class="col-lg-4"><div class="list-group" style="margin-left:0px">
  <a href="user.php" class="list-group-item">
    All task
  </a>
     <a href="ourskill.php" class="list-group-item ">Profile
  </a>

  <a href="" data-toggle="modal" data-target="#squarespaceModal" class="list-group-item">
  	Post Task
  </a>
  <a href="my_task.php" class="list-group-item">My task
  </a>
  <a href="notification.php" class="list-group-item">
    Notification
  </a>
  
  
  <a href="changepass.php" class="list-group-item active" style="background-color:black;">Change Password
  </a>
  <a href="applicantlogout.php" class="list-group-item">Log Out
  </a>
</div></div>
 	     <div class="col-lg-8">

            <!--left-content-->
			<div class="center">
				<div class="posts">
					<div class="create-posts">
						<div class="col-sm-10 well">
 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	 <input type="hidden" class="form-control"  name= "id" >
 
  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control" value="<?php echo @$opassword; ?>" name="oldpassword" id="exampleInputPassword1" placeholder="Old Password" required>
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" value="<?php echo @$npassword; ?>" class="form-control" name="newpassword" id="exampleInputPassword1" placeholder="New Password" required>
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" value="<?php echo @$cpassword; ?>" class="form-control" name="confirmpassword" id="exampleInputPassword1" placeholder="Confirm Password" required>
  </div>
  

<br/>
<div class="form-group">
    <button name="changepass" class="btn  btn-success" type="submit">Update Password</button>
</div>
	</form>	
		</div>

 	     </div>
     <div>
</div>
</div>

		<!--content -->
			
						




</div>

</div>

</div>



 
<!-- Bootstrap Core JavaScript -->
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
 $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('.status').click(function() { $('.arrow').css("left", 0);});
			$('.photos').click(function() { $('.arrow').css("left", 146);});
		});
	</script>
	

</body>
</html>