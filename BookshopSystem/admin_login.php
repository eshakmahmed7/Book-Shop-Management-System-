<?php 
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "bookshopmangement";

    function execute($query){
        global $db_server,$db_user,$db_password,$db_name;
        $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name);
        mysqli_query($conn,$query);
    }

    function get($query){
        global $db_server,$db_user,$db_password,$db_name;
        $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name);
        $result = mysqli_query($conn,$query);
        $data=array();
        if ( mysqli_num_rows ($result) > 0){
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
        }
    }
        return $data;
    }
$username = "";
$err_username = "";
$password = "";
$err_password = "";
// $err_message="";

 if(isset($_POST["login"])){ 
    if (empty($_POST["username"])) {
        $err_username = "Username Required";
    } else {
        $username =($_POST["username"]);
    }
    if (empty($_POST["password"])) {
        $err_password = "Password Required";
    } else {
        $password = ($_POST["password"]);
    }
    
    if(authenticateUser($username,$password)){
            session_start();
            $_SESSION["users"]=$username;
           header ("Location: admin_dashboard.php");
        }
        else{
            
            echo "Invalid username or password";
            
        }
        
    }

    function authenticateUser($username,$password){
        $query ="select * from admin where username='$username' and password='$password'";
        $result = get($query);
        if( count($result)>0){
            return true;
    }
        return false;
  }
     if(isset($_GET["logout"]) && $_GET["logout"] == "true"){
        session_start();
        session_destroy();
     }
?>

<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style1.css">

</head>
<body>
</head>
<form action="" method = "POST">

<body>

        <section class="whole shadow">

            <tr>
                <td><h2 class="admin" >Admin login</h2></td>
                <td><img src="images/img_1.svg" alt="Encryption picture" width="400" height="350"></td>
            </tr>
            <tr>
<br>
            </tr>
            
            <form action="" method="post">
            
                <div class="user">
                 <tr>
                    <td><span>Username :</span></td>
                    <td><input type="text"  name="username" value="<?php echo $username; ?>"placeholder="Username ">
                    <span><?php echo $err_username; ?></span>
                    </td>
                 </tr>
                 <br><br>
                 <tr>
                    <td><span>Password : </h4></span></td>
                    <td><input type="password" name="password" placeholder="Password ">
                    <span><?php echo $err_password; ?></span>
                    </td>
                 </tr>
                 </div>
<br>
                 <tr>
                    <td><input type="submit" name="login" value="Login"></td>
                 </tr>
               
                 <!--tr> 
                    <td><br><br>First time!!!!!<br><a href="reg.php">Sign Up</a></td>
                 </tr-->
                 </section>

        </body>

        </form>
        </html>