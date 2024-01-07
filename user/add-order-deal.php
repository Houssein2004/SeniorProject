<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];
$did = $_GET['did'];

$result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' AND dealID='$did'");
if(mysqli_num_rows($result1)>0){

$order_id= uniqid (rand(1,8));

$city = $_POST['city'];
$street = $_POST['street'];
$building = $_POST['building'];
$payment = $_POST['payment_method'];
$status=0;
$currentDateTime = date("Y-m-d H:i:s");


if($payment == "credit card"){
    if(isset($_POST['card_number']) && isset($_POST['card_date'])){
        $cardNumber = $_POST['card_number'];
        $cardExpDate = $_POST['card_date'];
        while($row1 = mysqli_fetch_array($result1)){
           $qtty = $row1['qtty'];
           $result2 = mysqli_query($con,"SELECT * FROM deals Where dealID='$did'");
if(mysqli_num_rows($result2)>0){
    while($row2 = mysqli_fetch_array($result2)){
        $discount = $row2['discount'];
        $fid = $row2['foodID'];
$result3 = mysqli_query($con,"SELECT * FROM menu WHERE foodID='$fid'");
               $row3 = mysqli_fetch_array($result3);
               $price = $row3['price'];
               $newPrice = $price - $price*$discount/100;
               $total = $newPrice*$qtty + 5;
               
            }}}            
        $sql_add_query = "INSERT INTO order_deals VALUES ('$order_id','$uid','$did','$city','$street','$building','$payment','$cardNumber',
        '$cardExpDate','$qtty','$total','$currentDateTime','$status')";
        $result= mysqli_query($con,$sql_add_query);
            
        $sql = "DELETE FROM cart WHERE userID='$uid' and dealID='$did'";
        mysqli_query($con, $sql);
        echo "<script>
        window.open('oders.php','_self');
        </script>"; 
    }
    else{echo "<script>
          alert('Please enter your credit card info');
        window.open('checkout.php','_self');
        </script>";
}
}

else{
        $cardNumber = $_POST['card_number'];
        $cardExpDate = $_POST['card_date'];
        while($row1 = mysqli_fetch_array($result1)){
            $qtty = $row1['qtty'];
            $result2 = mysqli_query($con,"SELECT * FROM deals Where dealID='$did'");
 if(mysqli_num_rows($result2)>0){
     while($row2 = mysqli_fetch_array($result2)){
         $discount = $row2['discount'];
         $fid = $row2['foodID'];
 $result3 = mysqli_query($con,"SELECT * FROM menu WHERE foodID='$fid'");
                $row3 = mysqli_fetch_array($result3);
                $price = $row3['price'];
                $newPrice = $price - $price*$discount/100;
                $total = $newPrice*$qtty +5;
                
             }}}            
         $sql_add_query = "INSERT INTO order_deals VALUES ('$order_id','$uid','$did','$city','$street','$building','$payment','$cardNumber',
         '$cardExpDate','$qtty','$total','$currentDateTime','$status')";
         $result= mysqli_query($con,$sql_add_query);
             
         $sql = "DELETE FROM cart WHERE userID='$uid' and dealID='$did'";
         mysqli_query($con, $sql);
         echo "<script>
         window.open('orders.php','_self');
         </script>"; 
}
}
?>