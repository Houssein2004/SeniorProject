<?php
require_once 'conx.php';

$cartID = $_GET['cartid'];

$result1 = mysqli_query($con,"SELECT * FROM cart Where cartID='$cartID'");
$row1 = mysqli_fetch_array($result1);
$qtty = $row1['qtty'];
$did = $row1['dealID'];

if(isset($_POST['minus']) && $qtty>1){ 
$new_qtty = $qtty-1;
$sql = "UPDATE cart SET qtty='$new_qtty' WHERE cartID='$cartID'";
$result= mysqli_query($con,$sql);
echo "<script>
    window.open('order-deal.php?did=$did','_self');
</script>";
}


if(isset($_POST['plus'])){
    $new_qtty = $qtty+1;
    $sql = "UPDATE cart SET qtty='$new_qtty' WHERE cartID='$cartID'";
    $result= mysqli_query($con,$sql);
    echo "<script>
    window.open('order-deal.php?did=$did','_self');
</script>";
}
   
