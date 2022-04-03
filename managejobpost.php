

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
    width: 70%;
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
    width: 65%;
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


	<form method="post" action="managejobpost.php" >
	
	
	 
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>CompanyName</th>
			<th>Job Title</th>
			<th>Pay Rate</th>
			<th>Address</th>
			<th>Jobduties</th>
			<th>Work Type</th>
			
			<th colspan="2">Action</th>
		</tr>
	</thead>

	
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		    <td><?php echo $row['id']; ?></td>
			<td><?php echo $row['companyname']; ?></td>
			<td><?php echo $row['jobtitle']; ?></td>
			<td><?php echo $row['payrate']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['jobduties']; ?></td>
			<td><?php echo $row['worktype']; ?></td>
			<td>
				<a href="jobpost.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="managejobpost.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


	
	</form>
</body>
</html>


