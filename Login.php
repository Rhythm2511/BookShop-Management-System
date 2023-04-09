<?php
    include ("connection.php");
    
    
    

    if (isset($_SESSION['username'])) 
    {
        header("Location: Welcome.php");
    }

    else
    {
        $username = $password ="";
    $usernameErr = $passwordErr ="";
    $error = "";
    
    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        

        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($_POST["username"]))
        {
            $usernameErr = "Please enter a username.";
        }

        if(empty($_POST["password"]))
        {
            $passwordErr = "Please enter a password.";
        }

        if(empty($usernameErr) && empty($passwordErr))
        {
            
            $sql = "SELECT * FROM manager WHERE uname = '$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) 
            {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['username'] = $row['uname'];
                
                header("Location: Welcome.php");
                exit;
            } 
            else 
            {
                $error = "Invalid username or password";
            }
        }
        
    }
    }
    
?>


<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <center>
            <div class="loginbox">
                <img src="avatar1.png" class="avatar">
                
                <h1>Bookworm-Life</h1>

            <form action="Login.php" method="POST">
                <label id="username">Username:</label>
                <input type="text" name="username" id="username">
                <span style="color:red">* <?php echo $usernameErr;?></span>
                <br><br>

                <label id="password">Password:</label>
                <input type="password" name="password" id="password">
                <span style="color:red">* <?php echo $passwordErr;?></span>
                <br><br>

                <input type="submit" name="submit" value="Login">
            

            <a href="registration.php">SIGN UP</a>

            <br>

            </form>


            <br><br>
            <br><br>
            <?php include 'footer.php';?>
            </div>
            

            
            
            
        
        </center>
    </body>

</html>