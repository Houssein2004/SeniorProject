<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];
$discountedPrice = $_SESSION['tot'];
echo $discountedPrice;

$result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid'");
if(mysqli_num_rows($result1)>0){

$order_id= uniqid (rand(1,8));
$city = $_POST['city'];
$street = $_POST['street'];
$building = $_POST['building'];
$payment = $_POST['payment_method'];
$status=0;
$currentDateTime = date("Y-m-d H:i:s");
$numberOfItems = mysqli_num_rows($result1);

$itemIDs = array();
$itemQtty = array();
$itemPrices = array();

if($payment == "credit card"){
    if(isset($_POST['card_number']) && isset($_POST['card_date'])){
        $cardNumber = $_POST['card_number'];
        $cardExpDate = $_POST['card_date']; 
        while($row1 = mysqli_fetch_array($result1)){
           
            $fid = $row1['foodID'];
            $itemIDs[] = $fid;
            $qtty=$row1['qtty'];
            $itemQtty[] = $qtty;

            $result2 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
                $row2 = mysqli_fetch_array($result2);
                $price = $row2['price']*$qtty;
                
                $itemPrices[] = $price;
                
                $arrayIDs = serialize($itemIDs);
                $arrayPrices = serialize($itemPrices);
                $arrayQtty = serialize($itemQtty);    
            }             
        $sql_add_query = "INSERT INTO orders VALUES ('$order_id','$uid','$arrayIDs','$arrayPrices','$arrayQtty','$payment','$cardNumber',
        '$cardExpDate','$city','$street','$building','$discountedPrice','$status','$currentDateTime','$numberOfItems')";
        $result= mysqli_query($con,$sql_add_query);
            
        $sql = "DELETE FROM cart WHERE userID='$uid'";
        mysqli_query($con, $sql);
        echo "<script>
        window.open('orders.php','_self');
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
        $fid = $row1['foodID'];
        $itemIDs[] = $fid;
        $qtty=$row1['qtty'];
        $itemQtty[] = $qtty;
        $result2 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
            $row2 = mysqli_fetch_array($result2);
            $price = $row2['price']*$qtty;
            $itemPrices[] = $price;
            
            $arrayIDs = serialize($itemIDs);
            $arrayPrices = serialize($itemPrices);
            $arrayQtty = serialize($itemQtty);

        }             
    $sql_add_query = "INSERT INTO orders VALUES ('$order_id','$uid','$arrayIDs','$arrayPrices','$arrayQtty','$payment','$cardNumber',
    '$cardExpDate','$city','$street','$building','$discountedPrice','$status','$currentDateTime','$numberOfItems')";
    $result= mysqli_query($con,$sql_add_query);
        
    $sql = "DELETE FROM cart WHERE userID='$uid'";
    mysqli_query($con, $sql);
    echo "<script>
    window.open('orders.php','_self');
	</script>"; 
}
}
?>