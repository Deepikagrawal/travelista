<?php
$con=mysqli_connect("localhost","root","","travel_db");

$package=$_POST["package"];
$email=$_POST["email"];

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT * from tour where email='$email'";
if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	  include 'error.html';
  }
  else{
$sql1="update tour set pid ='$package' where email ='$email' ";
if ($con->query($sql1) === TRUE) {
    include "transport.html";
  }
mysqli_free_result($result);
}

mysqli_close($con);
  }
?>
