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
    $username="";
    $err_username="";
    $password="";
    $err_password="";
    $country="";
    $err_country="";
    $email="";
    $err_email="";
    $address="";
    $err_address="";
    $dob="";
    $err_dob=""; 
    $gender="";
    $err_gender="";
    $phone="";
    $err_phone="";
    $nid="";
    $err_nid="";
    $hasError=false;
    //$result="";

    function validateEmail($email){
      $pos_at = strpos($email,"@");
      $pos_dot = strpos($email,".",$pos_at+1);
      if($pos_at <$pos_dot){
        return true;
      }

      return false;
    }

    if(isset($_POST["register"])){
    
		    if(empty($_POST["name"])){
					$err_name= "*Name is Required";
				}
        else if(strlen($_POST["name"])<5){
          $err_name="Name should be at least 5 characters";
        }
				else{
					$name=$_POST["name"];
        }
        if(empty($_POST["username"])){
					$err_username= "*Username is Required";
				}
        else if(strlen($_POST["username"])<3){
          $err_username="Userame should be at least 3 characters";
        }
        elseif (strpos($_POST["username"]," ")){
          $err_username="Username should not contain any space";
        }
				else{
					$username=$_POST["username"];
        }
       if(empty($_POST["password"])){
        $err_password="*Password is Required";
        }		
        elseif (strlen($_POST["password"])<6){
        $err_password="Password must be 6 characters long";
        }

        elseif(strpos($_POST["password"]," "))
        {
        $err_password="Password should not contain white space";
        } 
        else
        {
        $password=$_POST["password"];
        }		
        if(empty($_POST["country"])){
          $err_country="*Country name should be required.";
        }
        else{
          $country=$_POST["country"];
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
           if(empty($_POST["phone"])){
            $err_phone="*Number is Required";
          }
          else if(strlen($_POST["phone"])<11){
            $err_phone="*At least 11 numbers";
          }
          elseif (strpos($_POST["phone"]," ")){
           $err_phone="Number should not contain any space";
          }
          else{
            $phone=$_POST["phone"];
          }
          if(empty($_POST["gender"])){
            $err_gender= "*gender is Required";
           }
           else{
             $gender=$_POST["gender"];
           }
          if(empty($_POST["nid"])){
            $err_nid="*NID is Required";
          }
          else if(strlen($_POST["nid"])<15){
            $err_nid="*At least 15 numbers";
          }
          elseif (strpos($_POST["nid"]," ")){
           $err_nid="Number should not contain any space";
          }
          else{
            $nid=$_POST["nid"];
          }
          if(!isset($_POST["day"]) || !isset($_POST["month"]) || !isset($_POST["year"])){
            $err_dob="*Date is required";
          }
          else{
            $dob=$_POST["day"]."-".$_POST["month"]."-".$_POST["year"];
          }
          if(!$hasError){
            insertUser($name,$username,$password,$country,$email,$dob,$phone,$gender,$nid);
         }
          /*if(!$hasError){
            checkUserName($username);
          } */
         }
       
          function insertUser($name,$username,$password,$country,$email,$dob,$phone,$gender,$nid){
            $query ="INSERT INTO users VALUES(NULL,'$name','$username','$password','$country','$email','$dob','$phone','$gender','$nid')";
            execute($query);
        }
        function checkUserName($username){
          $query="select * from users where username='$username'";
          $result= get($query);
          if(count($result)>0){
              return false;
          }
          return true;
      }
 // require_once "js/reg.js";
 /// require "js/ajax.js";
  //require_once "checkUserName.php";
?>
 <html>
 <head>
 <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style3.css">
 <style>
 
    
 </style>
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
		if(get("username").value == ""){
            get("err_username").innerHTML = "Username Required";
			get("err_username").style.color = "red";
			hasError = true;
		}else if(get("username").value.length<3){
            get("err_username").innerHTML = "Username must be at least 3 characters long";
            get("err_username").style.color = "red";
			hasError = true;
		}
        if(get("password").value == ""){
            get("err_password").innerHTML = "Password Required";
			get("err_password").style.color = "red";
			hasError = true;
		}
		else if(get("password").value.length < 6){
            get("err_password").innerHTML = "Passwordd must be atleast 8 character long.";
            get("err_password").style.color = "red";
			hasError = true;
		}
		if(get("country").value == ""){
            get("err_country").innerHTML = "Country name Required";
			get("err_country").style.color = "red";
			hasError = true;
		}
        if(get("email").value == ""){
            get("err_email").innerHTML = "E-mail Required";
			get("err_email").style.color = "red";
			hasError = true;
		}
		if(get("phone").value == ""){
            get("err_phone").innerHTML = "Number Required";
			get("err_phone").style.color = "red";
			hasError = true;
		}else if(get("phone").value.length<11){
            get("err_phone").innerHTML = "At least 11 numbers";
			get("err_phone").style.color = "red";
		}
        if(!get("male").checked && !get("female").checked){
			get("err_gender").innerHTML = "Select a gender";
			get("err_gender").style.color = "red";
			hasError = true;
		}
		if(get("day").selectedIndex==0){
			//alert("prblm in day");
		}
        /*if(!get("day").checked && !get("month").checked && !get("year").checked){
			get("err_date").innerHTML = "Select a date";
			get("err_date").style.color = "red";
			hasError = true;
		} */
        if(get("nid").value == ""){
            get("err_nid").innerHTML = "Number Required";
			get("err_nid").style.color = "red";
			hasError = true;
		}
		else if(get("nid").value.length < 15){
            get("err_nid").innerHTML = "Nid must be atleast 8 character long.";
            get("err_nid").style.color = "red";
			hasError = true;
		}
        return !hasError;		
	}

    function refresh(){
		get("err_name").innerHTML = "";
		get("err_username").innerHTML = "";
		get("err_password").innerHTML = "";
		get("err_country").innerHTML = "";
		get("err_email").innerHTML = "";
		get("err_phone").innerHTML = "";
		get("err_gender").innerHTML = "";
       // get("err_date").innerHTML = "";
		get("err_nid").innerHTML = "";
	}

</script>  
 <form action="" method="POST" onsubmit="return validate()" >
<section class="whole shadow">

 <legend><b><h3 class="registraion">Registration</h3></b></legend>

 <body>
   <div class="imgage">
 <td><img id="myimg" src="images/img_7.jpg" alt="Encryption picture" width="800" height="962"></td>
    </div>
 <div class="registraion">

 <tr>
					<td><span>Full Name : </span></td>
					<td><span><input type="text" name="name" value="<?php echo $name;?>"placeholder="name" id="name"></span>
					<span id="err_name"><?php echo $err_name;?></span><br><br>
 </tr>
 <tr>
					<td><span>Username : </span></td>
					<td><span><input type="text" name="username" onfocusout="checkUserName(this)" value="<?php echo $username;?>"placeholder="name" id="username"></span>
					<span id="err_username"><?php echo $err_username;?></span><br><br>
 </tr>
 <tr>
      				<td><span>Password :</span></td>
      				<td><span><input type="Password" name="password" value="<?php echo $password;?>"placeholder="password" id="password"></span>
      				<span id="err_password"><?php echo $err_password;?></span><br><br>
 </tr>
 <tr>
					<td><span>Country : </span></td>
				  	<td><span><input type="text" name="country" value="<?php echo $country;?>"placeholder="country" id="country"></span>
					<span id="err_country"><?php echo $err_country;?></span><br><br>
 </tr>
 
 <tr>
					<td><span>Email : </span></td>
					<td><span><input type="text" name="email" value="<?php echo $email;?>"placeholder="email" id="email"></span>
					<span id="err_email"><?php echo $err_email;?></span><br><br>
 </tr>
 
 <tr>
					<td><span>Birth Date : </span></td>   
					<td><select id="day" name="day">
					<option disabled selected>Day</option>
					<?php
						for($i=1;$i<=31;$i++)
						{
							echo "<option>$i</option>";
						}
					?>
					</select>
					<select id="month" name="month">
					<option disabled selected>Month</option>
					<?php
						$mon= array("January","February","March","April","May","June","July","August","September","October","November","December");
						for($j=0;$j<count($mon);$j++)
						{
							echo "<option>$mon[$j]</option>";
						}
					?>
					</select>
					<select id="year" name="year">
					<option disabled selected>Year</option>
					<?php
						for($k=1971;$k<=2040;$k++)
						{
							echo "<option>$k</option>";
						}
					?>
					</select><?php echo $err_dob;?></span><br><br>
					</td>
					</tr>

 <tr>
					<td><span>Phone : </span></td>
					<td><span><input type="text" name="phone" value="<?php echo $phone;?>"placeholder="number" id="phone"></span>
					<span id="err_phone"><?php echo $err_phone;?></span><br><br>
 </tr>

 <tr>
          			<td><span>Gender </span></td>
          			<td><span><input type="radio" value="Male" name="gender" id="male">Male</span>
					<span><input type="radio" value="Female" name="gender" id="female">Female</span>
          			<span id="err_gender" ><?php echo $err_gender; ?></span><br><br>
 </tr>   
 <tr>
					<td><span>NID : </span></td>
					<td><span><input type="text" name="nid" value="<?php echo $nid;?>"placeholder="number" id="nid"></span>
					<span id="err_nid"><?php echo $err_nid;?></span><br>
 </tr>         

 <tr>
					<td><br><input type="submit" name="register" value="Sign Up"></td><br><br>
 </tr>

 </div>
 </form>
 <a class="login" href = "login.php"><b>Login page</b></a>
 </section>
 </body>
 <script>
	function checkUserName(username){
		//alert(username.value);
		var name = username.value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				var rs = this.responseText;
				if(rs == "true"){
					document.getElementById("err_username").innerHTML="Valid";
				}
				else{
					document.getElementById("err_username").innerHTML="Invalid username";
				}
			}
			
			};
			xhttp.open("GET","checkUserName.php?username="+name,true);
			xhttp.send();
	}
 </script> 
 </html>