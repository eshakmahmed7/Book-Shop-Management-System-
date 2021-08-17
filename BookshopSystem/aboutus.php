<?php 
session_start();
if(!isset($_SESSION["users"]))   // Destroying All Sessions
{ 
    header("Location: login.php"); // Redirecting To Home Page
}
?>
<html>
<head>
<style>
 body{
 background-color:pink;
 
 }
 
             a:link,a:visited{
              background-color: #dd2d4a;
              color: white;
              padding: 6px 16px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              border-radius: 20px;
            
             }

            
         * {

            margin: 0 ;
            padding: 0;
            
         } 

        
         
         h1{
             color:#f26a8d;
             font-size: 2rem;
             font-weight: 700rem;
             letter-spacing: 8px;
             margin-bottom: 2rem;
             border-bottom: 3px solid #edffec;
             padding: 20px;
             text-align: center;
         
              
         }
        
         .about-us{
             background: #fff;
         }
         .about-us h2{
            
             font-size:  2rem;
             font-weight: 700rem;
             margin: 1rem 0;
             text-align: center;
            
        }
        .about-us h2 span {
            color:#dd2d4a;
            margin: 1rem 0;
           
             
        } 
       
        .about-us p{
            margin: 1rem 0;
            font-weight: 700rem;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            text-align: center;
            padding:15px;
            padding-top: 5px;
    
        }
        .about-us h3 {
            font-weight: 700rem;
            font-family: 'Poppins', sans-serif;
            color:#dd2d4a;
            font-size: 20px;
            font-weight: 700rem;
            margin-bottom: 20px;
            text-align: center;
            padding: 5px;
            padding-top: 2px;
        }
        .body{
            text-align: center;

        }
        .bottom-container{
            text-align: center;
           s
        }
        
</style>
</head>
<title>About Us</title>
<body>
<h1> ABOUT US! </h1>
<img src = "images/tienda-online.png" width = "300px" height ="180px">
<br><br><a href = "dashboard.php"><b>Go back</b></a>
<br><br><a href = "login.php?logout=true"><b>Log out</b></a>

<div class = "about-us">
    <h2>Dear Customer<span>!</span></h2>
<p>This is a bookstore website. In this page a booklover customer finds everything.
Anyone can search books, order books, regestration his/her name.
We provide log in option given below.
If you want to get our service, then go to sign up option.
After complete your registration, then you can go other links also and get our service.</p>
<h3>THANK YOU!</h3>
    </div>
    <div class="bottom-container">
    <p class="bp">© 2021 Bookshop Management.</p>
  </div>
    



    
</body>
</head>