
<?php
    session_start();
    if(!isset($_SESSION["users"]))   // Destroying All Sessions
    { 
        header("Location: admin_login.php"); // Redirecting To Home Page
    }
?>


<html>
	<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styleAdminDashboard.css">
		
	</head>
<body>
	
<section class="whole shadow">
<div class="imgage">
 <td><img id="myimg" src="images/admindashboard.jpg" alt="Encryption picture" width="500" height="635"></td>
    </div>
<div class="seller">
<h1>Dashboard Welcome:<?php echo $_SESSION["users"];?></h1>
	


		<legend><b><h3>Select</h3></b></legend>


<ul>
<a href="seller_add.php" ><b>Add Seller</b></a><br><br>
<a href="delivery_man_add.php" ><b>Add Delivery Man</b></a><br><br>
<a href="book_add.php" ><b>Add Books</b></a><br><br>
<a href="admin_login.php?logout=true" ><b>logout</b></a><br><br>
</ul>
			
			
			
</div>
</section>
			

</body>
</html>