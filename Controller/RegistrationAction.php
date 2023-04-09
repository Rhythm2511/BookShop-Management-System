<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Updates</title>
</head>
<body>
	<h1 align="center">Registered User List</h1>

	<?php 
	if ($_SERVER['REQUEST_METHOD']==="POST") 
	{
		function test($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		
	}
		$name = test($_POST['name']);
		$email = test($_POST['email']);
		$phone = test($_POST['phone']);
		$gender = test($_POST['gender']);
		$dateofbirth  = test($_POST['dateofbirth']);

		if (empty($name) or empty($email) or empty($phone) or empty($gender) or empty($dateofbirth)) {
			
			echo "Please fill up the form properly";
		}
		else
		{
			define("FILENAME", "users.json");
			$file1 = fopen(FILENAME, "r");
			$fr = fread($file1, filesize(FILENAME));
			$json = json_decode($fr);
			fclose($file1);

			$file2 = fopen(FILENAME, "w");
			$data = array("name" => $name, "email" => $email, "phone" => $phone, "gender" => $gender, "dateofbirth" => $dateofbirth);

			if($json == NULL)
			{
				$data = array($data);
				$data = json_encode($data);
				fwrite($file2, $data);
			}

			else
			{
				$json[] = $data;
				$data = json_encode($json);
				fwrite($file2, $data);
			}
			fclose($file2);
			$data = json_decode($data);
			echo "Registration Successful";

			echo"<br><br>";

			echo "<table>";
			echo "<thead>";
			echo"<tr>";
			echo "<th>Name</th>";
			echo "<th>Email</th>";
			echo "<th>Phone</th>";
			echo "<th>Gender</th>";
			echo "<th>DateOfBirth</th>";
			echo "</tr>";
			echo "</thead>";

			echo "<tbody>";

			for($i= 0; $i < count($data); $i++)
			{
				echo "<tr>";
				echo "<td>" . $data[$i]->name . "</td>";
				echo "<td>" . $data[$i]->email . "</td>";
				echo "<td>" . $data[$i]->phone . "</td>";

				echo "<td>" . $data[$i]->gender . "</td>";
				echo "<td>" . $data[$i]->dateofbirth . "</td>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	}
	?>

	<br><br>
	<a href="Welcome.php">Home</a>

</body>
</html>