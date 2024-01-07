<?php
require_once 'conx.php';

$uid=$_GET['uid'];

$new_stts = $_POST['status'];
$new_ccode = $_POST['ccode'];
$new_discount = $_POST['discount'];

$sql = "UPDATE users SET status='$new_stts',coupon_code='$new_ccode',discount='$new_discount'
 WHERE userID='$uid'";
$result_update= mysqli_query($con,$sql);
header("location:users.php");

?>