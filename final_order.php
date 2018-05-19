<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body >
<div class="cover" style="height:17 0%;margin-bottom:5%;">
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
$con=mysqli_connect("localhost","root","","travel_db");
$name=$_POST["name"];
$email=$_POST["email"];
$id=$_POST["id"];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * from tour where email='$email' and id='$id' and name='$name'";

if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	  echo 'no content';
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

mysqli_close($con);
?></div>
</div>		    
<div class="row" style="border:1px solid tomato;border-radius:25px;margin-top:5%;font-size:150%;text-align:left;">
<div class="col-sm-8"><ul style="list-style:none;">
		<li>Your transport :</li>
		<li>Your type of transport :</li>
		<li>The amount to pay :</li>
		<ul></div>
	<div class="col-sm-4" ><?php
$con=mysqli_connect("localhost","root","","travel_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * from transport where tid in (SELECT tid from tour where email='$email' and id='$id' and name='$name') ";

if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	 echo "no content";
  }
  while ($row=mysqli_fetch_row($result))
    {
     printf ("%s <br>",$row[0]);
	 printf ("%s <br>",$row[1]);
	 printf ("%s <br>",$row[2]);
	 
   }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?></div>
</div>		    

<div class="row" style="border:1px solid tomato;border-radius:25px;margin-top:5%;font-size:150%;text-align:left;">
	<div class="col-sm-8"><ul style="list-style:none;">
		<li>Your package name :</li>
		<li>Your package amount :</li>
		<li>Your package ID :</li>
		<ul></div>
		<div class="col-sm-4"><?php
$con=mysqli_connect("localhost","root","","travel_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * from package where pid in (SELECT pid from tour where email='$email' and id='$id'and name='$name') ";

if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  if($rowcount==0)
  {
	  echo 'no content';
  }
  while ($row=mysqli_fetch_row($result))
    {
     printf ("%s <br>",$row[0]);
	 printf ("%s <br>",$row[1]);
	 printf ("%s <br>",$row[2]);
	
   }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?></div>
</div>		    
<a href="index.html" class="btn btn-lg btn-secondary" id="btn1" style="font-size:20px;border-radius:0;padding:15px 25px;border:4px solid white;margin-bottom:15%;">DONE</a>
	
</div>
<footer style="text-align:center;margin-top:5%;margin-bottom:5%">
	<p>&copy; Deepika Agrawal</p>
	</footer>
</body>
</html>