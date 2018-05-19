<?php
$con=mysqli_connect("localhost","root","","travel_db");
$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * from tour where id='$id'";

if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	  include 'error.html';
  }
  else 
    {
     $sql1="delete from tour where id='$id'";
	 if ($con->query($sql1) === TRUE) {
    include "index.html";
}
	
   }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>