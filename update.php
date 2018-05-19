

<?php
$con=mysqli_connect("localhost","root","","travel_db");


$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$person = $_POST["person"];
$id=$_POST["id"];
$transport=$_POST["transport"];
$package=$_POST["package"];
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
  else{
$sql1 = "UPDATE tour set name='$name',email='$email', phone='$phone',today_date='$date',person='$person',pid='$package',tid='$transport' where id=$id";
if ($con->query($sql1) === TRUE) {
    include "final_order.html";
  }
  else
  {
	  echo "wrong";
  }
mysqli_free_result($result);
}

mysqli_close($con);
  }
?>
