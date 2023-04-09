<?php 
session_start();
if(!isset($_SESSION["username"]))
    {
        header("location: login.php");
        exit;
    }
?>
<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <fieldset>
        <center>
            <h1>Welcome!</h1><?php include 'header.php';?>
            <h3>Login Successful!</h3>

            <a href="Book.php">Book Add</a>

            <br>

            <a href="View.php">Show Registered User</a>

            <br>

            <a href="searchbook.php">Search Book</a>

            <br><br>

            <img src="1.jpg" width="800" height="300">

        </center>

        </fieldset>

        <center><?php include 'footer.php';?></center>

        <br><br>

        



    </body>
</html>

