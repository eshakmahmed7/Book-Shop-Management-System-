<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "bookshopmanagement";

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

    $username="";
    $err_username="";
    $bookname="";
    $err_bookname="";
    $mobile="";
    $err_mobile="";
    $email="";
    $err_email="";
    $address="";
    $err_address="";
    $hasError=false;

    function validateEmail($email){
      $pos_at = strpos($email,"@");
      $pos_dot = strpos($email,".",$pos_at+1);
      if($pos_at <$pos_dot){
        return true;
      }

      return false;
    }

    if(isset($_POST["add"])){
    if(empty($_POST["username"])){
      $err_username= "*Name is Required";
     }
         else if(strlen($_POST["username"])<3){
           $err_username="*Name should be at least 3 characters";
         }
         elseif (strpos($_POST["username"]," ")){
           $err_username="Name should not contain any space";
        
         }
         else{
           $username=$_POST["username"];
         }
         if(empty($_POST["bookname"])){
         $err_bookname= "*Book name is Required";
     
        }
         else{
          $bookname=$_POST["bookname"];
        }
        if(empty($_POST["mobile"])){
          $err_mobile="*Number is Required";
         
        }
          else if(strlen($_POST["mobile"])<11){
          $err_mobile="Number should be at least 11 characters";
         
        }
         elseif (strpos($_POST["mobile"]," ")){
         $err_mobile="Number should not contain any space";
       
        }
        else{
          $mobile=$_POST["mobile"];
        }
        if(empty($_POST["email"])){
          $err_email= "*Email is Required";
          }
         elseif(!validateEmail($_POST["email"])){
           $err_email = "Not a valid email";
         }
         else{
           $email=htmlspecialchars($_POST["email"]);
            }
        if(empty($_POST["address"])){
          $err_address= "*Address is Required";          
         }
         else{
           $address=$_POST["address"];
         }
         if(!$hasError){
            insertBook($username,$bookname,$mobile,$email,$address);
         }
    } 

        function insertBook($username,$bookname,$mobile,$email,$address){
            $query ="INSERT INTO addorder VALUES(NULL,'$username','$bookname','$mobile','$email','$address')";
            execute($query);
        }

	session_start();
    if(!isset($_SESSION["users"]))   // Destroying All Sessions
    { 
        header("Location: login.php"); // Redirecting To Home Page
    }
?>

<html>
<head>
  <title>Order Here</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styleorderform.css">	

</head>
<body>
<script>
    function get(id){
		return document.getElementById(id);
	}
	function validate(){
		refresh();
		var hasError=false;
		if(get("username").value == ""){
			get("err_username").innerHTML = "Username Required";
			get("err_username").style.color = "red";
			hasError = true;
		} else if(get("username").value.length<3){
            get("err_username").innerHTML = "Username must be at least 3 characters long";
            get("err_username").style.color = "red";
			hasError = true;
		}
		if(get("bookname").value == ""){
            get("err_bookname").innerHTML = "Bookname Required";
			get("err_bookname").style.color = "red";
			hasError = true;
		}
		if(get("mobile").value == ""){
            get("err_mobile").innerHTML = "Phone number Required";
			get("err_mobile").style.color = "red";
			hasError = true;
		}else if(get("mobile").value.length<11){
            get("err_mobile").innerHTML = "At least 11 numbers";
			get("err_mobile").style.color = "red";
			hasError=true;
		}
        if(get("email").value == ""){
            get("err_email").innerHTML = "E-mail Required";
			get("err_email").style.color = "red";
			hasError = true;
		}
		if(get("address").value == ""){
            get("err_address").innerHTML = "Address Required";
			get("err_address").style.color = "red";
			hasError = true;
		}
		
//isInteger
        return !hasError;		
	}

    function refresh(){
		get("err_username").innerHTML = "";
		get("err_bookname").innerHTML = "";
		get("err_mobile").innerHTML = "";
		get("err_email").innerHTML = "";
		get("err_address").innerHTML = "";
	}

</script>
<form action="" method="POST"  onsubmit="return validate()">
<!--<form action="order details.php" method="POST"  onsubmit="return validate()"> -->
<section class="whole shadow">
	  <div class="imgage">
 <td><img id="myimg" src="images/mu.png" alt="Encryption picture" width="300" height="500"></td>
    </div>

	<div class="seller">
<legend><b>Order Book</b></legend><br>


<tr>
					<td><span><b>User Name:</b></span></td>
					<td><span><input type="text" name="username" value="<?php echo $username;?>" placeholder="Name" id="username"></span>
					<span id="err_username"><?php echo $err_username;?></span>
</tr><br><br>
<tr>
					<td><span><b>Book Name:</b></span></td>
					<td><span><input type="text" name="bookname" value="<?php echo $bookname;?>" placeholder="Book" id="bookname"></span>
					<span id="err_bookname"><?php echo $err_bookname;?></span>
          </tr><br><br>
<tr>
					<td><span><b>Mobile No    :</b></span></td>
					<td><span><input type="text" placeholder="Number" value="<?php echo $mobile;?>" name="mobile" id="mobile"></span>
					<span id="err_mobile"><?php echo $err_mobile;?></span>
</tr><br><br>
<tr>
					<td><b><span>Email Add :</Address></b></span></td>
					<td><span><input type="text" name="email" value="<?php echo $email;?>" placeholder="email" id="email"></span>
					<span id="err_email"><?php echo $err_email;?></span>
</tr><br><br>
<tr>
					<td><b><span>Address              :</b></span></td>
					<td><span><input type="text" name="address" placeholder="address" value="<?php echo $address;?>" placeholder="address" id="address"></span>
					<span id="err_address"><?php echo $err_address;?></span>
</tr><br>

<tr>
					<td><br><input type="submit" name="add" value="Confirm"></td>

 </tr><br><br>



<br><b><u><a href = "booklist.php">BookList</a></b></u>
</div>
</form>
</section>


</body>
</html>