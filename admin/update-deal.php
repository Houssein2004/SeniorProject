<?php
require_once 'conx.php';

$did=$_GET['did'];

$name = $_POST['name'];
$discount = $_POST['discount'];
$description = $_POST['description'];
$sDate = $_POST['sDate'];
$eDate = $_POST['eDate'];

$sql = "UPDATE deals SET name='$name',discount='$discount',startDate='$sDate',endDate='$eDate',
description='$description' WHERE dealID='$did'";
$result_update= mysqli_query($con,$sql);
echo "<script>
alert('Deal Updated!');
window.open('deals.php','_self');
</script>";


?>