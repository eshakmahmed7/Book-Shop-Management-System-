<?php
 session_start();
 if(!isset($_SESSION["users"]))   // Destroying All Sessions
 { 
     header("Location: login.php"); // Redirecting To Home Page
 }
?>

<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="stlyeuserinfo.css">

<body>

<section class="whole shadow">
<div class="imgage">
 <td><img id="myimg" src="images/imagesuserinfo.png" alt="Encryption picture" width="300" height="500"></td>
    </div>
<div class="seller">

<h1>Profile Page</h1>

<h3><p><br>Hello! Customer!</p></h3>
<a href = "addinfo.php"><b>Add information</b></a><br><br>
<a href = "dashboard.php"><b>Options</b></a><br><br>
<a href = "login.php"><b>Log out</b></a>
</div>
</section>
</body>
</head>
</html>