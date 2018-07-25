<?php
$host="localhost";
$user="root";
$password="";
$db="login";
$db=mysqli_connect('localhost','root','','login');
mysqli_connect($host,$user,$password);


if(isset($_POST['username'])){
	$uname=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM info WHERE username='".$uname."' AND password='".$password."' limit 1"; 
	mysqli_query($db, $sql);
		$result=mysqli_query($db,$sql);
   
	if(mysqli_num_rows($result)==1){
		 header('location:Home.php');
		
	}
	  else{	  
	  echo "<script>alert('try again');</script>";
	  
		
	}
}

?>

<html>
<title>  </title>
<head> 
<link rel="stylesheet" a href="style.css" />
 </head>
<body>
<div class = "container">
<img src="pic/p3.png" width="500" height="600" />
<form method="POST" action="#">
<div class="input_group">
<input type="text" name="username" placeholder="Enter user name"/>
</div>

<div class="input_group">
<input type="password" name="password" placeholder="Enter password"/>
</div>

<div class="input_group">
<input type="submit" value="Login" class="btn-login"/> 
</div>
</form>

</div>



</body>


</html>