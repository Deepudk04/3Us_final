<?php 
    session_start();
    require 'dbconfig/config.php'
?>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
       <div> 
        <input type="text" name="location">
        <input name="findfood" type="Submit" value="FIND FOOD">
       </div>
       <br>
       <br>
       <div>
          <input name="checkSchedule" type="Submit" value="CHECK SCHEDULES">
       </div>
    </body>
</html>
<?php
    if(isset($_POST["findfood"]))
    {
        //echo '<script type="text/javascript"> alert("Submit is clicked") </script>';
        $loc = $_POST["location"];
        //$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $query = "select * from hotel_details where hotel_location = '$loc'";
        $query_run = mysqli_query($con,$query);
        $check=$_POST['pass'];
        $check_pass= password_verify( $check, $query);

    
        if(mysqli_num_rows($query_run)>0)
        {
            
            $_SESSION['location']=$loc;
            header('location:rest.php');
            //echo '<script type="text/javascript"> alert("Login done successfully") </script>';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Invalid Credentials")
             </script>';
        }
    }
?>