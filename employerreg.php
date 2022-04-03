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
			<div>
				<label>Username:</label>
				<input type="text" id="e1" size="40">
              
			</div>
			<div>
				<label>Password:</label>
				<input type="text"
					id="p1" size="40">
				
			</div>
			<button type="submit"
					onclick="errorMessage()">
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

   if(e!==email_val||p<=8){  
        error.innerHTML = "<span style='color: red;'>"+
						"Username and password both failed to meet requirement</span>"
    }  
    else if (!email_val.test(e))  
            {  
                error.innerHTML = "<span class='crimson'>"+
						"Username failed to meet requirement</span>"
            }  
   
   
    else if(document.getElementById("p1").value.length < 8)  
    {  
        error.innerHTML = "<span class='crimson'>" +
						"password failed to meet requirement</span>"
    } 
		 else {
			error.innerHTML = "<span style='color: green;'>"+
						"username/password meet requirement</span>"
		}
	}
</script>

</html>					

