<?php 
    session_start();
    require 'dbconfig/config.php';
    error_reporting(0);
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <form action="3u_login.php" method="post">
            Email: <input type="email" name="name" required><br>
            Password: <input type="password" name="pass" required>
            <input name="sname" type="Submit" value="LOGIN">
            <a href="3u_signup.php"><input name="register" type="button" value="SIGN UP"></a>
            <a href="3u_reset.php">forgot password?</a>
        </form>
        <br>
    </body>
</html>
<?php
    if(isset($_POST["sname"]))
    {
        //echo '<script type="text/javascript"> alert("Submit is clicked") </script>';
        $uname = $_POST["name"];
        //$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $query = "select user_password from user_details where user_email = '$uname'";
        $query_run = mysqli_query($con,$query);
        $check=$_POST['pass'];
        $check_pass= password_verify( $check, $query);

    
        if(mysqli_num_rows($query_run)>0)
        {
            
            $_SESSION['name']=$uname;
            header('location:3u_home.php');
            //echo '<script type="text/javascript"> alert("Login done successfully") </script>';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Invalid Credentials")
             </script>';
        }
    }
?>