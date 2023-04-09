<?php 
	$bname = $category = $price = $bookdetails = "";
	$bnameErr = $categoryErr = $priceErr = $bookdetailsErr = "";

	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		include('connection.php');

		$bname = $_POST['bname'];
		$category = @$_POST['category'];
		$price = $_POST['price'];
		$bookdetails = @$_POST['bookdetails'];
		
		

		if (empty($_POST["bname"])) 
	  	{
	    	$bnameErr = "Book name is required";
	  	} 

	   	if (empty($_POST["category"])) 
	   	{
	   		$categoryErr = "Category is required";

	   	}
	   

	   	if (empty($_POST["price"])) 
	   	{
    		$priceErr = "Price is required";
  		} 

  		if (empty($_POST["bookdetails"])) 
  		{
    		$bookdetailsErr = "Book details is required";
  		} 

  		

    	if(empty($bnameErr) && empty($categoryErr) && empty($priceErr) && empty($bookdetailsErr)) 
    	{
    		
			$insertQuery = "INSERT into book (bookname, category, price, bookdetails) values ('$bname', '$category', '$price', '$bookdetails')";

			$result = mysqli_query($conn, $insertQuery);

			if ($result)
			{
				header("Location: Welcome.php");
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
	<title>Book</title>
</head>
<body>

	<fieldset>
		<h1 align="center"><b>Bookworm-Life</b></h1>	
		<form name="bookForm" action="Book.php" method="post" onsubmit="validateForm()">
			<fieldset>
				<legend align="center"><h3>Book Information</h3></legend>

				<label for="bname">Book Name:</label>
				<input type="text" name="bname" id="bname" placeholder="Please write the book name" >
				<span class="error">* <?php echo $bnameErr;?></span>
				<br><br>

				<label>Category</label>
				<select name="category" id="category" >
					<option>---Select---</option>
					<option value="Action & Adventure">Action & Adventure </option>
					<option value="Comics">Comics</option>
					<option value="Detective">Detective</option>
					<option value="Horror">Horror</option>
					<option value="Fantasy">Fantasy</option>
					<option value="Sci-Fi">Science Fiction</option>
					<option value="Literature">Literature</option>

				</select>
				<span class="error">* <?php echo $categoryErr;?></span>
				<br><br>

				<label>Price: </label>
				<input type="number" name="price" id="price" >
				<span class="error">* <?php echo $priceErr;?></span>
				<br><br>

				<label for="bookdetails">Book Details:</label>
				<textarea id="bookdetails" name="bookdetails" placeholder="Write short description." rows="2" cols="50"></textarea>
				<span class="error">* <?php echo $bookdetailsErr;?></span>


			</fieldset>

			<br><br>
			<input type="reset" name="reset" value="Reset">
			<button type="submit" name="submit">Submit</button>
		
		</form>

	</fieldset>

</body>
</html>