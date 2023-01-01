<?php
$con = mysqli_connect("localhost","root","","fest");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $userstore= $_POST['Uname'];
  $passstore=$_POST['Pass'];
  $var="SELECT * FROM `user` WHERE username='$userstore' AND password='$passstore'";
  $query=mysqli_query($con,$var);
  $row = mysqli_fetch_array($query);
  if (isset($row[0])) {
    session_start();
    $_SESSION['regName'] = $userstore;
    header('Location: afterlogin.php');
  }
  else{
    echo '<script> 
    alert("Enter The Correct Credentials!!!!");
    window.location.href = "index.html";
    </script>';
  }
?>

