<?php
session_start();
?>


<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <center>
            <h1>Bookworm-Life</h1>
            <form action="LoginAction.php" method="post">
                <label id="username">Username:</label>
                <input type="text" name="username" id="username">
                <br><br>

                <label id="password">Password:</label>
                <input type="password" name="password" id="password">
                <br><br>

                <input type="submit" name="submit" value="Login">
            </form>

            <a href="registration.html">SIGN UP</a>
            
            
        
        </center>
    </body>

</html>