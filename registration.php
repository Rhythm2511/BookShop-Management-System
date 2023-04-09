<?php 
	$name = $email = $phone = $gender = $dob = $uname = $password = $cpassword= "";
	$nameErr = $emailErr = $phoneErr = $genderErr = $dobErr = $unameErr = $passwordErr = $cpasswordErr = "";

	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		include('connection.php');

		$name = $_POST['name'];
		$email = @$_POST['email'];
		$phone = $_POST['phone'];
		$gender = @$_POST['gender'];
		$dob = $_POST['dateofbirth'];
		$uname = $_POST['uname'];
		$password = $_POST['pwd'];
		$cpassword = $_POST['conpwd'];
		

		if (empty($_POST["name"])) 
	  	{
	    	$nameErr = "Name is required";
	  	} 

	   	if (!isset($_POST["email"])) 
	   	{
	   		$emailErr = "Email is required";

	   	}
	   	else 
  		{
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    		{
      			$emailErr = "Invalid email format";
    		}
  		}

	   	if (empty($_POST["phone"])) 
	   	{
    		$phoneErr = "Phone Number is required";
  		} 

  		if (empty($_POST["gender"])) 
  		{
    		$genderErr = "Gender is required";
  		} 

  		if (empty($_POST["dateofbirth"])) 
  		{
    		$dobErr = "Date of Birth is required";
  		} 

  		if (empty($_POST["uname"])) 
  		{
    		$unameErr = "Username is required";
  		}
  		else 
	  	{ 
	      	if (!preg_match("/^[a-zA-Z-' _]*$/",$uname)) 
	     	{
	        	$unameErr = "Only letters and white space allowed";
	      	}
	  	} 
	
  		if (empty($_POST["pwd"])) 
  		{
    		$passwordErr = "Password is required";
  		} 

  		if (empty($_POST["conpwd"])) 
  		{
    		$cpasswordErr = "Please confirm password";
  		} 

  		if ($password !== $cpassword) 
    	{
    		$passwordErr=  "!Password doesn't match.";
    	}
    	

    	if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($genderErr) && empty($dobErr) && empty($unameErr) && empty($passwordErr) && empty($cpasswordErr)) 
    	{
    		
			$insertQuery = "INSERT into manager (name, email, phone, gender, dob, uname, password) values ('$name', '$email', '$phone', '$gender', '$dob', '$uname', '$password')";

			$result = mysqli_query($conn, $insertQuery);

			if ($result)
			{
				header("Location: Login.php");
				die();
			}

    	}	


        
	}
	
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="registrationvalidation.js"></script>
	<style type="text/css">
		span{
			color: red;
		}
	</style>
	<title>Registration</title>
</head>
<body>
	<fieldset>
		<h1 align="center"><b>Registration Form<b></h1>
			
			<form name="signupForm" action="registration.php" method="POST" onsubmit="validateForm()">
				<fieldset>
					<legend align="center"><h3>User Information</h3></legend>

					<label for="name">Name:</label>
					<input type="text" name="name" id="name" placeholder="Please write your name.">
					<span class="error">* <?php echo $nameErr;?></span>
					<br><br>

					<label for="email">Email:</label>
					<input type="email" name="email" id="email" placeholder="example12@gmail.com">
					<span class="error">* <?php echo $emailErr;?></span>
					<br><br>

					<label for="phone">Phone Number:</label>
					<input type="tel" name="phone" id="phone" placeholder="01********">
					<span class="error">* <?php echo $phoneErr;?></span>
					<br><br>

					<label>Gender:</label>
					<input type="radio" name="gender" id="male" value="male"><label for="male">Male</label>

					<input type="radio" name="gender" id="female" value="female"><label for="female">Female</label>
					<span class="error">* <?php echo $genderErr;?></span>
					<br><br>

					<label>Date of Birth:</label>
					<input type="date" name="dateofbirth" id="dob">
					<span class="error">* <?php echo $dobErr;?></span>
					<br><br>

					<label for="uname">Username:</label>
					<input type="text" name="uname" id="uname" placeholder="Enter your Username" >
					<span class="error">* <?php echo $unameErr;?></span>
					<br><br>

					<label for="pwd">Password:</label>
					<input type="password" name="pwd" id="pwd" placeholder="Enter your Password" >
					<span class="error">* <?php echo $passwordErr;?></span>
					<br><br>

					<label for="conpwd">Confirm Password:</label>
					<input type="password" name="conpwd" id="conpwd" placeholder="Confirm your Password">
					<span class="error">* <?php echo $cpasswordErr;?></span>
					<br><br>


				</fieldset>

				<br><br>
				<input type="reset" name="reset" value="Clear All">
				<button type="submit" name="submit">Submit</button>
			</form>
	</fieldset>

</body>
</html>