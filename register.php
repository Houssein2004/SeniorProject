<?php
require_once 'conx.php';
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone'])){
    
    $uid= uniqid (rand(1,8));

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];

    $stts = 0;
    $ccode = "0";
    $discount = 0;

    if($pass1 == $pass2){
    $sql_add_query = "INSERT INTO users VALUES ('$uid','$fname','$lname','$email','$phone','$pass1',
    '$stts','$ccode','$discount')";
    $result= mysqli_query($con,$sql_add_query);
     header("location:index.php");
    }
    else {
        echo "<script>
		alert('Failed Registration! Password is not matched');
		window.open('signup.php','_self');
	</script>";
    }
}
?>

