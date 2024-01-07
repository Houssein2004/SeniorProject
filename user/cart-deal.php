<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];
    
    $did=$_GET['did'];
    $qtty = 1;
    $fid=0;

    $result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' AND dealID='$did'");

    if(mysqli_num_rows($result1)==0){
    $sql_add_query = "INSERT INTO cart VALUES ('','$uid','$fid','$did','$qtty')";
    $result = mysqli_query($con,$sql_add_query);
    echo "<script>
    window.open('order-deal.php?did=$did','_self');
    </script>";
    } 

    else{
        $row = mysqli_fetch_array($result1);
        $qtty1 = $row['qtty'];
        $new_qtty = $qtty1 +1;
    $sql = "UPDATE cart SET qtty='$new_qtty' WHERE userID='$uid' AND dealID='$did'";
    $result= mysqli_query($con,$sql);
    echo "<script>
    alert('You ordered $new_qtty from this deal');
    window.open('order-deal.php?did=$did','_self');
    </script>";
    }
?>