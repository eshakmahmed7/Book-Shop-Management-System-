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
<link rel="stylesheet" href="styledashboard.css">




<section class="whole shadow">
<div class="imgage">
 <td><img id="myimg" src="images/dashboard.jpeg" alt="Encryption picture" width="500" height="635"></td>
    </div>
<div class="seller">

<h3>Welcome  <?php echo $_SESSION["users"];?></h3>
<h3><b><u>Options:</u></b></h3>

<br><a href = "userinfo.php"><b>User Information</b></a>
<br><br><a href ="booklist.php"><b>Book List</b></a>
<br><br><a href ="aboutus.php"><b>About us</b></a>
<br><br><a href = "login.php?logout=true"><b>Log out</b></a>
</div>
</section>
</body>
</html>