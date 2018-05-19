<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "travel_db");
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];



// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO contacts (name, email, subject,message) VALUES
            ('$name','$email', '$subject','$message')";
if(mysqli_query($link, $sql)){
    include ("popup.html");
} else{
    include ("error.html");
}
 
// Close connection
mysqli_close($link);
?>