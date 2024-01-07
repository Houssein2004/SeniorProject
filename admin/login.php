<?php
session_start();
require_once '../conx.php';

if (isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from admin where email='".$email."' AND password='".$password."'";
    
    $result= mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)===1){
       $_SESSION['is_logged_in']=1;
        header("location:home.php");
    }
    else{
        echo "<script>
		alert('Failed Signin! Please enter correct email and password');
		window.open('index.php','_self');
	</script>";
}
}
    else{
        echo "<script>
		alert('Failed Signin!');
		window.open('index.php','_self');
	</script>";
    }


 
?>