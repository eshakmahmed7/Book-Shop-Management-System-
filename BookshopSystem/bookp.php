<?php

if(isset($_POST["submit"])){



      $name=$_POST["name"];

      $author=$_POST["author"];

      $price=$_POST["price"];

      $date=$_POST["date"];

      $conn = mysqli_connect('localhost', 'root','' , 'bookshopmanagement'); 

            $sql = "INSERT INTO book_add (name,author, price,date) VALUES( '$name','$author','$price','$date')";

            if (mysqli_query($conn, $sql))

             { 

                  session_start();

                   $_SESSION["name"]= $_POST["name"];

                   echo "Registration Accepted<br>"; 

                   header("refresh: 4; url= books.php");

            }

            

      }

else{

      if(session_status()==PHP_SESSION_NONE){}

      header("location:index.php");

}

?>


