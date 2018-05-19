<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find Tour</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="image/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body >
<div class="cover" style="height:17 0%;margin-bottom:0;background-image:url('image/tour.jpg');">
<nav class="navbar">
 <div class="container-fluid">
    <div class="navbar-header">
     
    </div>
	
    <ul class="nav navbar-nav navbar navbar-right" style="font-size:20px;">
      <li ><a href="index.html">Home</a></li>
       <li><a href="tour.htmk">Book now</a></li>
	   <li><a href="select_package.html">Select Package</a></li>
	   <li><a href="transport.html">Select ticket type</a></li>
      <li><a href="confirm.html">Display details</a></li>
	  <li><a href="delete.html">Delete details</a></li>
      <li><a href="update.html">Update Details</a></li>
	  
     
    </ul>
  </div>
</nav>

</div>

			
<!--related tours starts here-->
<div class="container" id="select" style="text-align:center;">
<h1 style="font-weight:bold;color:tomato">YOUR DETAILS</h1>
<div class="row" style="border:1px solid tomato;border-radius:25px;margin-top:5%;font-size:150%;text-align:left;">
<div class="col-sm-8"><ul style="list-style:none;">
		<li>Your ID :</li>
		<li>Your name :</li>
		<li>Your Email id :</li>
		<li>Your phone number :</li>
		<li>The date of your travel:</li>
		<li>Total people associated with the tour:</li>
		<ul></div>
	<div class="col-sm-4" ><?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "travel_db");
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$person = $_POST["person"];


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO tour (name, email, phone,today_date, person) VALUES
            ('$name','$email', '$phone','$date', '$person')";
if(mysqli_query($link, $sql)){

$sql="SELECT * FROM tour where name ='$name' and email='$email'";

if ($result=mysqli_query($link,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	  echo 'error.html';
  }
  while ($row=mysqli_fetch_row($result))
    {
     printf ("%s <br>",$row[0]);
	 printf ("%s <br>",$row[1]);
	 printf ("%s <br>",$row[2]);
	 printf ("%s <br>",$row[3]);
	 printf ("%s <br>",$row[4]);
	 printf ("%s <br>",$row[5]);
   }
  // Free result set
  mysqli_free_result($result);
}



} else{
   include ("error.html");;
}
 
// Close connection
mysqli_close($link);
?></div>
</div>		    
		    
<a href="select_package.html" class="btn btn-lg btn-secondary" id="btn1" style="font-size:20px;border-radius:0;padding:15px 25px;border:4px solid white;margin-bottom:15%;">DONE</a>
	
</div>
<footer style="text-align:center;margin-top:5%;margin-bottom:5%">
	<p>&copy; Deepika Agrawal</p>
	</footer>
</body>
</html>