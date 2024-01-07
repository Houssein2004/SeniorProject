<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];

$result1 = mysqli_query($con,"SELECT * FROM users WHERE userID='$uid'");
   $row = mysqli_fetch_array($result1);

$cpass = $row['password'];
$npass1 = $_POST['npass1'];
$npass2 = $_POST['npass2'];


if($_POST['cpass'] == $cpass){
 if($npass1 == $npass2)
{
$sql = "UPDATE users SET password='$npass1' WHERE userID='$uid'";

    $result= mysqli_query($con,$sql);
   
    echo "<script>
    alert('Password is updated!');
    window.open('account-settings.php','_self');
    </script>"; 
}
else{
    echo "<script>
    alert('Please confirm your password');
    window.open('account-settings.php','_self');
</script>";  
}
}
else{
    echo "<script>
    alert('Your current password is wrong');
    window.open('account-settings.php','_self');
</script>";
}

?>