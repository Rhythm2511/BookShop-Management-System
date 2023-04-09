<?php 
$dtls = file_get_contents('books.json');
$dtlsOK = json_decode($dtls);

?>

<div class = "container">
	<h1>Book List</h1>
	<div class="row">
		<div class="col">

			<?php foreach ($dtlsOK as $ok)
			echo "<div class=col>
			<h2> $ok->bname</h2>
			<p> => $ok->category</p>
			<p> => $ok->price</p>
			<p> => $ok->bookdetails</p>";
			 			
			?>

		</div>
	</div>
</div>