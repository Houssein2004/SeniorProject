<?php
session_start();
require_once 'conx.php';

if (isset($_POST['phone']) && isset($_POST['password'])){
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $query="select * from users where phone='".$phone."' AND password='".$password."'";
    
    $result= mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)===1){
       $_SESSION['is_logged_in']=1;
        $row= mysqli_fetch_array($result);
        $uid = $row['userID'];
        $_SESSION['uid'] = $uid;
        header("location:user/home.php");
    }
    else{
        echo "<script>
		alert('Failed Signin! Please enter correct phone number and password');
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