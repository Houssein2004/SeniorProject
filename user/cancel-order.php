<?php
require_once 'conx.php';

$oid=$_GET['oid'];

$new_stts = 3;

$sql = "UPDATE orders SET order_status='$new_stts' WHERE orderID='$oid'";
$result_update= mysqli_query($con,$sql);
header("location:orders.php");

?>