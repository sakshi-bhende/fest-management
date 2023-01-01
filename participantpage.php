<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<?php
    session_start();
    $user=$_SESSION['regName'];
    $con = mysqli_connect("localhost","root","","fest");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $sql="SELECT `eventid` FROM `event-host` WHERE `hostname`='$user'";
    $query=mysqli_query($con,$sql);
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
        <?php
    while($row = mysqli_fetch_assoc($query))
    {
        $temp=$row['eventid'];
        $val="SELECT * FROM `particpant` where `eventid`= '$temp'";
        $query1=mysqli_query($con,$val);
        $val2="SELECT `eventname` FROM `event-host` WHERE `eventid`='$temp'";
        $query2=mysqli_query($con,$val2);
        $row2 = mysqli_fetch_assoc($query2);
         while($row1 = mysqli_fetch_assoc($query1))
         {
            echo "
            <tr>
            <td>".$row1['participantname']."</td>
            <td>".$row1['email']."</td>
            <td>".$row2['eventname']."</td>
            </tr>";
         }
    }
?>
</table>
</body>
</html>