<?php
$con = mysqli_connect("localhost","root","","fest");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $eventid=$_POST['input'];
  $userstore= $_POST['username'];
  $emailstore=$_POST['email'];
  $var="SELECT * FROM `user` WHERE username='$userstore' ";
  $query=mysqli_query($con,$var);
  $row = mysqli_fetch_array($query);
  if (isset($row[0])) {
    $sql="INSERT INTO `particpant` (`participantname`, `email`, `eventid`) VALUES ('$userstore', '$emailstore','$eventid')";
    if(mysqli_query($con,$sql))
    {
     echo '<script> 
     alert("Register Successfull!!!");
     window.location.href = "afterlogin.php";
     </script>';
    }
  }
  else{
    echo '<script> 
     alert("Enter correct username!!!");
     window.location.href = "participant.php";
     </script>';
  }
?>
  