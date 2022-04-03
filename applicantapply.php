<?php
// connect to database
include 'dbcon.php';

$sql = "SELECT * FROM cvfiles";
$result = mysqli_query($dbcon, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked

    
    $firstname=$_POST['firstname']; 
    $lastname=$_POST['lastname'];
    $email=$_POST['email']; 	
	$gender=$_POST['gender'];
	$phone=$_POST['phone']; 
    $address=$_POST['address']; 
	
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "Your file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO cvfiles (firstname, lastname, email,gender, phone, address,filename, size, downloads) 
			VALUES ('$firstname','$lastname','$email','$gender','$phone','$address','$filename', $size, 0)";
            if (mysqli_query($dbcon, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}


// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM cvfiles WHERE id=$id";
    $result = mysqli_query($dbcon, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE cvfiles SET downloads=$newCount WHERE id=$id";
        mysqli_query($dbcon, $updateQuery);
        exit;
    }

}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <style>
  form {
  width: 30%;
  margin: 100px auto;
  padding: 30px;
  border: 1px solid #555;
}
input {
  width: 100%;
  border: 1px solid #f1e1e1;
  display: block;
  padding: 5px 10px;
}
button {
  border: none;
  padding: 10px;
  border-radius: 5px;
}
table {
  width: 60%;
  border-collapse: collapse;
  margin: 100px auto;
}
th,
td {
  height: 50px;
  vertical-align: center;
  border: 1px solid black;
}
  </style>
  <body>
    <div class="container">
      <div class="row">
        <form action="submitcv.php" method="post" enctype="multipart/form-data" >
          <h3>Submit Job Application</h3>
		  
		    <label>Firstname :</label> 
			<input type="text" name="firstname" > 
		   <label>Lastname :</label> 
		   <input type="text" name="lastname"> 
		    <label>Email : </label> 
		   <input type="text" name="email"> <br>
		    <label>Gender : </label>
			<select name="gender" id="">
					<option>Male</option>
					<option>Female</option>
				</select> <br> <br>
				 <label>Phone No</label> 
		   <input type="text" name="phone"> <br>
		    <label>Address</label> 
		   <input type="text" name="address"> <br>
           <label>Upload Resume : (.zip, .pdf or .docx)</label> 
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">Submit </button>
        </form>
      </div>
    </div>
  </body>
</html>