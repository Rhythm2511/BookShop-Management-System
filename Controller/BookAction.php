<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Updates</title>
</head>
<body>

	<h1 align="center">Registered Book List</h1>

	<?php
	if ($_SERVER['REQUEST_METHOD']==="POST") 
	{
		function test($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		
	}

		$bname = test($_POST['bname']);
		$category = test($_POST['category']);
		$price = test($_POST['price']);
		$bookdetails = test($_POST['bookdetails']);
		
		if (empty($bname) or empty($category) or empty($price) or empty($bookdetails)) {
			
			echo "Please fill up the form properly";
		}

		else
		{
	
		define("FILENAME" , "books.json");
		$file3 = fopen(FILENAME, "r");
		$fr = fread($file3, filesize(FILENAME));
		$json = json_decode($fr);
		fclose($file3);

		$file4 = fopen(FILENAME, "w");
		$data = array("bname" => $bname, "category" => $category, "price" => $price, "bookdetails" => $bookdetails);

		if ($json == NULL) {
			
			$data = array($data);
			$data = json_encode($data);
			fwrite($file4 ,$data);
		}

		else
		{
			$json[]=$data;
			$data=json_decode($json);
			fwrite($file4, $data);
		}
		fclose($file4);
		$data = json_decode($data);
		echo "Successful";

		echo "<br><br>";

		echo "<table>";
		echo "<thead>";
		echo"<tr>";
		echo "<th>Book Name</th>";
		echo "<th>Category</th>";
		echo "<th>Price</th>";
		echo "<th>Book Details</th>";
		echo "</tr>";
		echo "</thead>";

		echo "<tbody>";

		for($i= 0; $i < count($data); $i++)
			{
				echo "<tr>";
				echo "<td>" . $data[$i]->bname . "</td>";
				echo "<td>" . $data[$i]->category . "</td>";
				echo "<td>" . $data[$i]->price . "</td>";

				echo "<td>" . $data[$i]->bookdetails . "</td>";
				
			}
			echo "</tbody>";
			echo "</table>";

		}

		}
	?>

</body>
</html>