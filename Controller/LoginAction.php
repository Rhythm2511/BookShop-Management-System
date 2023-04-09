<?php
session_start();
?>

<?php
define('Welcome', TRUE);
require('Welcome.php');
echo "Hello";
?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <?php
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "manager" and $password == "1234")
        {
            header("Location: Welcome.php");

        }
        else
        {
            $_SESSION['error_msg']="Login Failed!";
            header("Location: Login.php");
        }    
        ?>
        
    </body>
</html>