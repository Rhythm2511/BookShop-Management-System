<?php

	session_start();
	include('connection.php');

	$username =  "";

	if(!isset($_SESSION["username"]))
	{
	    header("location: Login.php");
	    exit;
	}
	$username = $_SESSION['username'];
	

		

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registered User</title>
	

</head>
<body>
	<h1 class="header">Registered User</h1>
	<form>
		<?php
			
			$sql = "SELECT * FROM manager ";
			$result = mysqli_query($conn, $sql);
			if($result)
			{

	    		if(mysqli_num_rows($result) > 0)
	    		{
	        		echo "<table class='table'>";
	            	echo "<tr>";
	                echo "<th>ID</th>";
	                echo "<th>Name</th>";
	                echo "<th>Email</th>";
	                echo "<th>Phone Number</th>";
	                echo "<th>Gender</th>";
	                echo "<th>DateOfBirth</th>";
	                echo "<th>Username</th>";
	                echo "<th>Password</th>";

	            	echo "</tr>";
	        		while($row = mysqli_fetch_array($result))
	        		{
	            		echo "<tr>";
	                	echo "<td>" . $row['id'] . "</td>";
	                	echo "<td>" . $row['name'] . "</td>";
	                	echo "<td>" . $row['email'] . "</td>";
	                	echo "<td>" . $row['phone'] . "</td>";
	                	echo "<td>" . $row['gender'] . "</td>";
	                	echo "<td>" . $row['dob'] . "</td>";
	                	echo "<td>" . $row['uname'] . "</td>";
	                	echo "<td>" . $row['password'] . "</td>";
	            		echo "</tr>";
	        		}	
	        echo "</table>";
	    		}
	    	}


		?>
		<br>
		<a href="Welcome.php"><-Back</a>
	</form>




</body>
</html>