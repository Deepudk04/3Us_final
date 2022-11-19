<?php 
    session_start();
    require 'dbconfig/config.php'
?>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <div class="head">
            <h1>LIST OF RESTURANTS</h1>
        </div>
       <div> 
          
       </div>
       <br>
       <br>
       <div>
          <input name="checkSchedule" type="Submit" value="CHECK SCHEDULES">
       </div>
    </body>
</html>
<?php
    if(isset($_POST["sname"]))
    {
        //echo '<script type="text/javascript"> alert("Submit is clicked") </script>';
        $uname = $_POST["name"];
        //$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $query = "select password from user where email = '$uname'";
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