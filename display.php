<?php
$con=mysqli_connect("localhost","root","","travel_db");

$name=$_POST["name"];
$email=$_POST["email"];

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM tour where name ='$name' and email='$email'";

if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	  echo 'error.html';
  }
  while ($row=mysqli_fetch_row($result))
    {
    include ("select_package.html");
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>