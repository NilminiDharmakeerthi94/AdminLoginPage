<?php  
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	
	 else
    {
        session_destroy();
        session_start(); 
    }
$user_id="";
$user_name="";
$branch="";
$city="";
$errors=array();


//connect to the database

$db=mysqli_connect('localhost','root','','user_ms');

//if the adduser button is clicked
if(isset($_POST['adduser'])){
	 $user_id=mysqli_real_escape_string($db,$_POST['user_id']);
     $user_name=mysqli_real_escape_string($db,$_POST['user_name']);
     $branch=mysqli_real_escape_string($db,$_POST['branch']);
     $city=mysqli_real_escape_string($db,$_POST['city']);
   
    // ensure that form field are filled properly

     if (empty($user_id)) {
     	array_push($errors, "user_id is required" . "<br>");
     	
     }
     if (empty($user_name)) {
     	array_push($errors, "user_name is required" . "<br>");
     	
     }
      if (empty($branch)) {
     	array_push($errors, "branch is required" . "<br>");
     	
     }
	 
	  if (empty($city)) {
     	array_push($errors, "city is required" . "<br>");
     	
     }
                                                                        //add user
	 if (count($errors)==0) {
     	
     	$sql="INSERT INTO adduser(user_id,user_name,branch,city) 
     	                 VALUES ('$user_id','$user_name','$branch','$city')";
     	# code...
    mysqli_query($db, $sql);
	 }
	 if((count($errors)==0)) {	  
	  echo "<script>alert('one user added');</script>";
	  
	 }
	}
	
                                                                                           //delete user
	if(isset($_POST['deleteuser'])){
	 $user_id=mysqli_real_escape_string($db,$_POST['user_id']);
     $user_name=mysqli_real_escape_string($db,$_POST['user_name']);	
	 
	  if (empty($user_id)) {
     	array_push($errors, "user_id is required ". "<br>");
     	
     }
	
     if (empty($user_name)) {
     	array_push($errors, "user_name is required");
     	
     }
	 if (count($errors)==0) {
	 $query="DELETE * FROM adduser WHERE user_id='$user_id' AND user_name='$user_name' ";
	 	$result=mysqli_query($db,$query);
		if(mysqli_num_rows($result)==1){
			//log user in
				
			$_SESSION['user_id']=$user_id;
		}
	} 
	 if((count($errors)==0)) {	  
	  echo "<script>alert('one user deleted');</script>";
	  }	
	}

                                                                                   //edit user
	 if(isset($_POST['edituser'])){
	 $user_id=mysqli_real_escape_string($db,$_POST['user_id']);
     $user_name=mysqli_real_escape_string($db,$_POST['user_name']);
     $branch=mysqli_real_escape_string($db,$_POST['branch']);
     $city=mysqli_real_escape_string($db,$_POST['city']);
   
    // ensure that form field are filled properly

     if (empty($user_id)) {
     	array_push($errors, "user_id is required" . "<br>");
     	
     }
     if (empty($user_name)) {
     	array_push($errors, "user_name is required" . "<br>");
     	
     }
      if (empty($branch)) {
     	array_push($errors, "branch is required" . "<br>");
     	
     }
	 
	  if (empty($city)) {
     	array_push($errors, "city is required" . "<br>");
     	
     }

	 if (count($errors)==0) {
     	
     	$query= "UPDATE adduser SET user_name='$user_name',branch='$branch',city='$city' WHERE id='$user_id";
    mysqli_query($db, $query);
	 }
	 if((count($errors)==0)) {	  
	  echo "<script>alert('data edited');</script>";
	  
	 }
	}
	






	
	


?>