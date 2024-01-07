<?php
require_once 'conx.php';

$fid=$_GET['fid'];

$name = $_POST['name'];
$price = $_POST['price'];

$sql = "UPDATE menu SET name='$name',price='$price' WHERE foodID='$fid'";
$result_update= mysqli_query($con,$sql);
echo "<script>
alert('Food Updated!');
window.open('menu.php','_self');
</script>";


?>