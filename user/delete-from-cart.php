<?php
include_once "conx.php";
$sql = "DELETE FROM cart WHERE cartID='" . $_GET["cartid"] . "'";
mysqli_query($con, $sql);

header("location:cart.php");
?>