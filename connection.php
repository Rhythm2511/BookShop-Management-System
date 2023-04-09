<?php

	$DBhostname='localhost';
	$DBusername='root';
	$DBpassword='';
	$DBname= 'bookshop';
	$conn= mysqli_connect($DBhostname,$DBusername,$DBpassword,$DBname);

    if ($conn->connect_error) 
    {
       die("Error". mysqli_connect_error());
    }
 
    
?>