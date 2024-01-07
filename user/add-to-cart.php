<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];
    
    $fid=$_GET['fid'];
    $qtty = 1;
    $did = 0;

    $result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' AND foodID='$fid'");

    if(mysqli_num_rows($result1)==0){
    $sql_add_query = "INSERT INTO cart VALUES ('','$uid','$fid','$did','$qtty')";
    $result = mysqli_query($con,$sql_add_query);
   echo "<script>
        alert('This food is added to your cart');
		window.open('menu.php','_self');
	</script>";
}
else{
    echo "<script>
    alert('This food already exists in your cart');
    window.open('menu.php','_self');
    </script>";
}
        
    

?>