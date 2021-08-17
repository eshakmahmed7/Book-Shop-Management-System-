<?php
    session_start();
    if(!isset($_SESSION["users"]))   // Destroying All Sessions
    { 
        header("Location: index.php"); // Redirecting To Home Page
    }
?>


<html>
	<head>
		<title>Add Book</title>
		

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="stylebooks.css">		
	</head>
<body>

<section class="whole shadow">
	  <div class="imgage">
 <td><img id="myimg" src="images/354602.png" alt="Encryption picture" width="300" height="500"></td>
    </div>

	<div class="seller">
	<h2><p><br>Add Book</p></h2>
        <a href="book_add.php"><b>Add Book</b></a></br><br>
		</div>
</section>
			
			
			
			

</body>
</html>