<?php
	session_start();

	include('connection.php');
	$username = "";
	$searchErr = "";

	if(!isset($_SESSION["username"]))
	{
	    header("location: login.php");
	    exit;
	}

	if ($_SERVER['REQUEST_METHOD']== "POST") 
	{
		$bookId = $_POST['bookId'];
		if (empty($bookId)) 
		{
			$searchErr = "Please insert book id";
		}
		if(empty($searchErr))
		{
			$_SESSION['bookId'] = $bookId;
			header("Location: ViewBook.php");
		}
	}

  ?>


<!DOCTYPE html>
<html>
<head>
	
	

<title>Book List</title>
</head>

	<h1 class="header">Search for Books</h1>
	<div>
		<form action="searchbook.php" method="POST">
			
			<label><b>Search book id:</b></label>
			<input type="text" name="bookId" id="bookId" placeholder="Type in the book id" oninput="showBooks(this.value)">

			

			<p><a href="Welcome.php"><-Back</a></p>
		</form>
		<br>
		<div id="txtHint"></div>
		<br>

	</div>

	<script>
		function showBooks(str)
		{
			if (str=="") 
			{
				document.getElementById("txtHint").innerHTML="";
				return;
			}

			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() 
			{
				if (this.readyState==4 && this.status==200) 
				{
					document.getElementById("txtHint").innerHTML=this.responseText;
				}
			}
			xmlhttp.open("GET","viewBookSearch.php?bookId="+str,true);
			xmlhttp.send();
		}
	</script>
</body>
</html>