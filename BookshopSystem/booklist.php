<?php 
 session_start();
 if(!isset($_SESSION["users"]))   // Destroying All Sessions
 { 
     header("Location: login.php"); // Redirecting To Home Page
 }
?>
<html>
<head>
    <title> Book List </title>
<style>


</style>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="stylebooklist.css">	
<body>
<section class="whole shadow">
<div class="List" >
<h2>Book Lists</h2>
<td><img src="images/pic6.jfif" width="240px" height="140px"></td>
<td><img src="images/pic9.jfif" width="240px" height="140px"></td>
<td><img src="images/pic7.jfif" width="240px" height="140px"></td>

<table>

<th>Book ID</th>
<th><th>Book Name</th>
<th><th>Author</th>
<th>Publication</th>
<th><th>Genre</th>
<th><th>Price</th>
<th><th>Published date</th>
<th><th>Seller Name</th>
<tr>
<td>112233</td>
<td><td>Steve Jobs</td>
<td><td>Walter Isaacson</td>
<td>Us Publication</td>
<td><td>Biography</td>
<td><td>300</td>
<td><td>2020-11-19</td>
<td><td>aiman</td>
<td><tr><td>12345</td>
<td><td>Sherlock Holmes</td>
<td><td>Arthur Conan Doyle</td>
<td>UK Publication</td>
<td><td>Fantasy</td>
<td><td>500</td>
<td><td>2020-11-07</td>
<td><td>aiman</td>
<td><tr><td>22222</td>
<td><td>Dune (novel)</td>
<td><td>Frank Herbert</td>
<td>UK Publication</td>
<td><td>Sci-Fiction</td>
<td><td>800</td>
<td><td>2020-11-14</td>
<td><td>aiman</td>
<td><tr><td>456321</td>
<td><td>Hitler's Secret Book</td>
<td><td>Zweites Buch</td>
<td>Us Publication</td>
<td><td>Biography</td>
<td><td>600</td>
<td><td>2020-11-10</td>
<td><td>aiman</td>
<td><tr><td>456321</td>
<td><td>Feluda Somogro</td>
<td><td>Sattajit Roy</td>
<td>bd Publication</td>
<td><td>Adventure</td>
<td><td>350</td>
<td><td>1991-11-11</td>
<td><td>Jubayer</td>
</tr>
</tr>
</table>
</div>
<div class= "seller" >
<br><a href = "orderform.php"><b>Order Book</b></a>
<br><br>
<a href = "dashboard.php"><b>Options</b></a>
<br><br>
<a href = "login.php"><b>Log out</b></a>
</div>
    </section>
</body>
</html>