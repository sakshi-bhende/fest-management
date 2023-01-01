<?php
$con = mysqli_connect("localhost","root","","fest");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $eventnamestore=$_POST['eventname'];
  $eventcateorgystore=$_POST['eventcateorgy'];
  $eventdetailstore=$_POST['eventdetail'];
  $userstore=$_POST['Username'];
  $venuestore=$_POST['Venue'];
  $datetimestore=$_POST['date'];
  $emailstore=$_POST['Emailid'];
  $phonestore=$_POST['Phonenumber']; 
 
  $var="SELECT * from `user` WHERE username ='$userstore' ";
  $query=mysqli_query($con,$var);
  $row = mysqli_fetch_array($query);
  if (isset($row[0])) {
    $sql= "INSERT INTO `event-host` (`hostname`, `eventname`, `eventcateogry`, `evenatdetail`, `venue`, `phone`, `email`, `datetime`) VALUES  ('$userstore','$eventnamestore','$eventcateorgystore',' $eventdetailstore',' $venuestore','$phonestore','$emailstore','$datetimestore')";
   if(mysqli_query($con,$sql))
   {
    echo '<script> 
     alert("event-host Added Successfully");
     window.location.href = "afterlogin.php";
     </script>';
   }
  }
  else{
    echo '<script> 
     alert("Enter correct username!!!");
     window.location.href = "hostform.html";
     </script>';
  }
?>