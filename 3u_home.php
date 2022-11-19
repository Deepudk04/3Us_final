<?php 
    //session_start();
    require 'dbconfig/config.php'
?>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    </head>
    <body>
        <form action="3u_home.php" method="post">
       <div> 
       <h1>
            Welcome to Sunday Samayal
        </h1>
        <input type="text" name="location">
        <input name="findfood" type="Submit" value="FIND FOOD">
       </div>
       <br>
       <br>
       <div>
          <input name="checkSchedule" type="Submit" value="CHECK SCHEDULES">
       </div>
       </form>
       <h1>The hotels in the given location</h1>
       <table border="1" >
            <tr>
                <th>Hotel id</th>
                <th>Hotel name</th>
                <th>Hotel ratings</th>
                <th>Details</th>
            </tr>
       </table>
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
     
   
        while($row=mysqli_fetch_array($query_run))
        {
            ?>
            <table>
             <tr>
                <td> <?php echo $row['hotel_id']?></td>
                <td> <?php echo $row['hotel_name']?></td>
                <td> <?php echo $row['hotel_ratings']?></td>
                <td> <input type="Submit" name="hotsub" value="View dishes" /> </td>
             </tr>
        </table>


             <?php
        }

        /*if(mysqli_num_rows($query_run)>0)
        {
            
            $_SESSION['location']=$loc;
            header('location:rest.php');
            //echo '<script type="text/javascript"> alert("Login done successfully") </script>';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Invalid Credentials")
             </script>';
        }*/
    }
?>