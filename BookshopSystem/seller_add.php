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

    $name="";
    $err_name="";
    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $gender="";
    $err_gender="";
    $email="";
    $err_email="";
    $mobile="";
    $err_mobile_numb="";
    $hasError = false;
    
    
     if(isset($_POST["register"]))
     {
	    if(empty($_POST["name"]))
	    {
		    $err_name="[Name Required}]";
		    $hasError = true;
	    }
	    else 
	    {
		    $name=$_POST["name"];
	    }
	    if(empty($_POST["uname"]))
	     {
		     $err_uname="[Username Required]";
		     $hasError = true;
	     }
	     elseif(strlen($_POST["uname"])<6)
	     {
		     $err_uname="[Username must be 6 charachters long]";
		     $hasError = true;
	     }
	     elseif(strpos($_POST["uname"]," "))
	     {
		     $err_uname="[Username should not contain white space]";
		     $hasError = true;
	     }
	     else
	     {
		     $uname=$_POST["uname"];
	     }
	     if(empty($_POST["pass"]))
	     {
		     $err_pass="[Password Required]";
		     $hasError = true;
	     }
	     elseif(strpos($_POST["pass"]," "))
	     {
		     $err_pass="[Password should not contain white space]";
		     $hasError = true;
	     }
	     else
	     {
		     $pass=$_POST["pass"];
	     }
	     if(!isset($_POST["gender"]))
	     {
		     $err_gender="[Please select a gender]";
		     $hasError = true;
	     }
	     else
	     {
		     $gender=$_POST["gender"];
	     }
	     if(empty($_POST["email"]))
	     {
		     $err_email="[Email Required]";
		     $hasError = true;
	     }else{
		     $email=htmlspecialchars($_POST["email"]);
	     }
	    if(empty($_POST["mobile"]))
	    {
		    $err_mobile_numb="[Mobile Number Required]";
		    $hasError = true;
	    }else
	    {
		    $mobile=$_POST["mobile"];
	    }
	    if(!$hasError){
	    insertUser($name,$uname,$pass,$gender,$email,$mobile);
	}
	     
     }
     
     
	    function insertUser($name,$uname,$pass,$gender,$email,$mobile)
	    {
	     $query="INSERT INTO seller_add VALUES (NULL, '$name', '$uname', '$pass', '$gender', '$email', '$mobile');";
	     execute($query);
	    }
	    
	    
	    function checkUsername($username){
	    $query = "select * from seller_add where uname='$username'";
	    $result = get($query);
	    if(count($result) > 0){
		    return false;
	    }
	    return true;		
    }
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
<link rel="stylesheet" href="style4.css">
	</head>
	<body>
	<script>
    function get(id){
		return document.getElementById(id);
	}
	function validate(){
		refresh();
		var hasError=false;
		if(get("name").value == ""){
            get("err_name").innerHTML = "Name Required";
			get("err_name").style.color = "red";
			hasError = true;
		}
		if(get("uname").value == ""){
			get("err_uname").innerHTML = "Username Required";
			get("err_uname").style.color = "red";
			hasError = true;
		}else if(get("uname").value.length<6){
            get("err_uname").innerHTML = "Username must be at least 6 charachters long";
			get("err_uname").style.color = "red";
			hasError = true;
        }else if(get("uname").value.indexOf(" ") > -1){
            get("err_uname").innerHTML = "Username shouldn't have any whitespaces";
			get("err_uname").style.color = "red";
        }

        if(get("pass").value == ""){
			get("err_pass").innerHTML = "Password Required";
			get("err_pass").style.color = "red";
			hasError = true;
		}else if(get("pass").length < 8){
            get("err_pass").innerHTML = "Password must be atleast 8 character long.";
			get("err_pass").style.color = "red";
			hasError = true;
        }else if(get("pass").indexOf(" ") > -1){
            get("err_pass").innerHTML = "Password shouldn't have any whitespaces";
			get("err_pass").style.color = "red";
        }
        
		if(!get("male").checked && !get("female").checked){
			get("err_gender").innerHTML = "Select a gender"
			get("err_gender").style.color = "red";
			hasError = true;
		}

        if(get("email").value == ""){
            get("err_email").innerHTML = "E-mail Required";
			get("err_email").style.color = "red";
			hasError = true;
		}
//isInteger
        if(get("mobile").value == ""){
            get("err_mobile_numb").innerHTML = "Phone Required";
			get("err_mobile_numb").style.color = "red";
			hasError = true;
		}else if(get("mobile").value.isInteger != false){
            get("err_mobile_numb").innerHTML = "Only Numeric Numbers are allowed.";
			get("err_mobile_numb").style.color = "red";
        }
        return !hasError;		
	}

    function refresh(){
		get("err_name").innerHTML = "";
		get("err_uname").innerHTML = "";
		get("err_pass").innerHTML = "";
		get("err_gender").innerHTML = "";
		get("err_email").innerHTML = "";
		get("err_mobile_numb").innerHTML = "";
	}

</script>

<section class="whole shadow">
<div class="imgage">
 <td><img id="myimg" src="images/img_12.jpg" alt="Encryption picture" width="700" height="960"></td>
    </div>
<div class="seller">
		<h1 >Add Seller</h1>
		<form action=""  onsubmit="return validate()" method="post">
		
		
		
			    <tr>
				<td><span><b>Name : </b></span></td>
					<td><input type="text" name="name" id="name" value="<?php echo $name;?>"placeholder="name">
					<span id="err_name" ><?php echo $err_name;?></span></td>
				</tr>
				<br><br>
				<tr>
					<td><span><b>Username :</b></span></td>
					<td><input type="text" name="uname" onfocusout="checkUsername(this)" id="uname" value="<?php echo $uname;?>"placeholder="uname">
					<span id="err_uname" > <?php echo $err_uname;?></span></td>
					

				</tr>
				<br><br>
				<tr>
					<td><span><b>Password :</b></span></td>
					<td><input type="password" name="pass" id="pass" value="<?php echo $pass;?>"placeholder="password">
					<span id="err_pass" ><?php echo $err_pass;?></span></td>
				</tr>
				<br><br>
				<tr>
					<td><span><b>Gender :</b></span></td>
					<td><input type="radio" name="gender" id="male" value="Male"><span>Male</span>
					    <input type="radio" name="gender" id="female" value="Female"><span>Female</span>
						<span id="err_gender" ><?php echo "&nbsp ".$err_gender;?></span></td>
				</tr>
				<br><br>
				<tr>
					<td><span><b>Email :</b></span></td>
					<td><input type="email" name="email" id="email" value="<?php echo $email;?>"placeholder="email">
					<span id="err_email" ><?php echo $err_email;?></span></td>
				</tr>
				<br><br>
				<tr>
					<td><span><b>Mobile :</b></span></td>
					<td><input type="tel" name="mobile" id="mobile" value="<?php echo $mobile;?>"placeholder="mobile">
					<span id="err_mobile_numb" ><?php echo $err_mobile_numb;?></span></td>
				</tr>
				<br><br>
				
			
			<br>

			<input type="submit" name="register" value="Register">
			</div>
		</form>
		</section>
	</body>
</html>





