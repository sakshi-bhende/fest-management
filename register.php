<?php
$con = mysqli_connect("localhost","root","","fest");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $firststore=$_POST['Firstname'];
  $laststore=$_POST['Lastname']; 
  $userstore=$_POST['Username']; 
  $passstore=$_POST['Password']; 
  $Addressstore=$_POST['Address'];
  $phonestore=$_POST['Phonenumber'];  
  $genderstore=$_POST['inlineRadioOptions'];  
  $emailstore=$_POST['Emailid'];  
  
  $var="SELECT * from `register` WHERE username='$userstore' ";
  $query=mysqli_query($con,$var);
  $row = mysqli_fetch_array($query);
  if (isset($row[0])) {
    echo '<script> 
     alert("Username Already Exist!!!!");
     window.location.href = "register.html";
     </script>';
    //   header('Location: register.html');
  }
  else{
   if($genderstore=="option1" ) 
   $genderstore="Female";
   elseif($genderstore=="option2")
   $genderstore=="Male";
   else
   $genderstore="Other";

   $sql="INSERT into `register`(firstname,lastname,username,password,phone,gender,email,address) VALUES ('$firststore','$laststore','$userstore','$passstore','$phonestore','$genderstore','$emailstore','$Addressstore')";
   if(mysqli_query($con,$sql))
   {
    echo '<script> 
     alert("User Added Successfully");
     window.location.href = "index.html";
     </script>'
     ;
    $sql="INSERT into `user` VALUES('$userstore','$passstore')";
    mysqli_query($con,$sql);
    // header('Location: hi.html');
   }
   else{
    echo"Error";
   }

  }
?>