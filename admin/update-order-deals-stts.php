<?php
require_once 'conx.php';

$oid=$_GET['oid'];

$new_stts = 1;

$sql = "UPDATE order_deals SET status='$new_stts' WHERE orderID='$oid'";
$result_update= mysqli_query($con,$sql);
header("location:deals-orders.php");

?>