<?php  
    session_start();
    if(!isset($_SESSION["users"]))   // Destroying All Sessions
    { 
        header("Location: login.php"); // Redirecting To Home Page
    }

    echo "<b><u>Order Details:</b></u><br><br>";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
		echo "<b>Name:</b>". $_POST["username"] ."<br>";
		echo "<b>Bookname:</b>". $_POST["bookname"] ."<br>";
		echo "<b>Mobile:</b>". $_POST["mobile"] ."<br>";
		echo "<b>Email:</b>". $_POST["email"]. "<br>";
		echo "<b>Address:</b>". $_POST["address"]. "<br>";
    }
?>
<html>
<head>
<style>
a:link, a:visited {
              background-color: green;
              color: white;
              padding: 8px 16px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
         }
</style>
</head>
    <br><br><b><u><a href = "order track.php">Shipping</a></b></u>
    <br><br><b><u><a href = "booklist.php">Booklist</a></b></u>
</html>