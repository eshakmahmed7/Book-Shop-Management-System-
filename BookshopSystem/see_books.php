<?php
    session_start();
    if(!isset($_SESSION["users"]))   // Destroying All Sessions
    { 
        header("Location: login.php"); // Redirecting To Home Page
    }
?>

<html>
	<head><b>Books List</b></head>
	<body>
	<center>
		<table border="1">
			<tr>
				<td><b>Name</b></td>
				<td><b>Quantity</b></td>
				
			</tr>
			<tr>
				<td>The art of Nature</td>
				<td>53</td>
				
			</tr>
			<tr>
				<td>The Mango Trees</td>
				<td>45</td>
				
			</tr>
			<tr>
				<td>Let Us C</td>
				<td>100</td>
				
			</tr>
		</table>
	</center>
	</body>
</html>