<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "<b>New Username:</b>". $_POST["username"]."<br>";
        echo "<b>New Password:</b>". $_POST["password"]."<br>";
        echo "<b>New address:</b>". $_POST["email"]."<br>";
        echo "<b>New mobile number:</b>". $_POST["phone"]."<br>";

    
    }
?>