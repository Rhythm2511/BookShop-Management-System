		

		<?php
			include ('connection.php');
			$bookId =$_GET["bookId"];
			$sql = "SELECT * FROM book WHERE id like '$bookId%' ";
			$result = mysqli_query($conn, $sql);
			if($result)
			{

	    		if(mysqli_num_rows($result) > 0)
	    		{
	        		echo "<table class='table'>";
	            	echo "<tr>";
	                echo "<th>Book ID</th>";
	                echo "<th>Book Name</th>";
	                echo "<th>Category</th>";
	                echo "<th>Price</th>";
	                echo "<th>Book Details</th>";
	            	echo "</tr>";
	        		while($row = mysqli_fetch_array($result))
	        		{
	            		echo "<tr>";
	                	echo "<td>" . $row['id'] . "</td>";
	                	echo "<td>" . $row['bookname'] . "</td>";
	                	echo "<td>" . $row['category'] . "</td>";
	                	echo "<td>" . $row['price'] . "</td>";
	                	echo "<td>" . $row['bookdetails'] . "</td>";
	            		echo "</tr>";
	        		}	
	        echo "</table>";
	    		}
	    	}


		?>