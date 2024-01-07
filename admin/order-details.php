<?php
include "header.php";
$oid = $_GET['oid'];
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Order Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 mb-lg-0">                           
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>User Info</h1>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                </thead>
                                                <tbody class="align-middle">
<?php
$result1 = mysqli_query($con,"SELECT * FROM orders Where orderID='$oid'");
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_array($result1)){
        $oid = $row1['orderID'];
        $uid = $row1['userID'];
        $nbr = $row1['numberOfItems'];
            $result2 = mysqli_query($con,"SELECT * FROM users WHERE userID = '$uid'");
            $row2 = mysqli_fetch_array($result2);
        $s = $row1['order_status'];
        if($s == 0) {$stts = "Pending";}
        else if($s == 1) {$stts = "Delivered";}
        else if($s == 2) {$stts = "Canceled";}
                           
   
                             
?>
                                        <tr><td>User ID</td><td><?php echo $uid ?></td></tr>
                                        <tr><td>Full Name</td><td><?php echo $row2['firstName'] ?> <?php echo $row2['lastName'] ?></td></tr>
                                        <tr><td>Phone Number</td><td><?php echo $row2['phone'] ?></td></tr>
                                        <tr><td>Address:</td><td><?php echo $row1['city'] ?>, <?php echo $row1['street'] ?>, <?php echo $row1['building'] ?></td></tr>
<?php if($row1['payment'] == "credit card"){ ?> 
                                        <tr><td>Payment Info</td><td><?php echo $row1['payment'] ?></td></td></tr>
                                        <tr><td>Card Number</td><td><?php echo $row1['cardNumber'] ?></td></td></tr>
                                        <tr><td>Card Expiry Date</td><td><?php echo $row1['cardExpiryDate'] ?></td></td></tr>
<?php }else{ ?>                                   
                                        <tr><td>Payment Info</td><td><?php echo $row1['payment'] ?></td></td></tr>
                                    </tbody> 
<?php }?>                                                                       
                                    </table>    
                    </div></div></div></div></div></div></div>
				
                <div class="col-lg-6">                           
                <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Order Details</h1>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                <th>Food ID</th>
                                                <th>Name & Picture</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                </thead>
                                                <tbody class="align-middle">
                                                    
<?php
$fids = unserialize($row1["foodID"]);
$prices = unserialize($row1["price"]);
$qttys= unserialize($row1["qtty"]);
$total =0;
for($j=0; $j<$nbr; $j++){
$fid = $fids[$j]; 
$price = $prices[$j];
$qtty = $qttys[$j];
$total+=$price;
$result2 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
$row2 = mysqli_fetch_array($result2);
$name = $row2['name'];
?> 
                                        <tr><td><?php echo $fid ?></td>
                                        <td><img src="../foods-pics/<?php echo $row2['picture'] ?>" style="height:65px; width:60px; ">
                                        <?php echo $name ?></td> 
                                        <td>$<?php echo $price ?> </td>
                                        <td><?php echo $qtty ?></td>
                                        </tr>
<?php }?> 
                                    </tbody>                                                                      
<?php }} ?>                      </table>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div> 
	<!-- end contact form -->



              <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-5 mb-lg-0">                           
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Bill Info</h1>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                </thead>
                                                <tbody class="align-middle">
<?php
$result1 = mysqli_query($con,"SELECT * FROM orders Where orderID='$oid'");
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_array($result1)){  
        $s = $row1['order_status'];
        if($s == 0) {$stts = "Pending";}
        else if($s == 1) {$stts = "Delivered";}
        else if($s == 2) {$stts = "Canceled";}                            
?>
                                        <tr><td>Order ID</td><td><?php echo $oid ?></td></tr>
                                        <tr><td>Date & Time</td><td><?php echo $row1['ordering_time'] ?></td></tr>
                                        <tr><td>Total Price</td><td>$<?php echo $total ?></td></td></tr>
                                        <tr><td>Discounted Price</td><td>$<?php echo $row1['discountedPrice'] ?></td></td></tr>
                                        <tr><td>Order Status</td><td><?php echo $stts ?></td></tr>
                                        <tr><td>Update Order Status</td>
                                        <td><form action="update-order-stts.php?oid=<?php echo $oid ?>" method="POST">
                                            <select class="form-control mb-2" name="stts" style="width:250px" value="<?php echo $stts ?>">
                                                <option value="0">Pending</option>
                                                <option value="1">Delivered</option>
                                                <option value="2">Canceled</option>
                                            </select>
                                            <button type="submit" class="btn-plus btn btn-primary" name="update"><i class="fa fa-edit"></i></button>
                                        </form>
                                        </td></tr>  
                                  
                                    </tbody> 
<?php }}?>                                                                      
                                    </table>
    
                    </div></div></div></div></div></div></div>
				
        </div>
	</div>
</div> 
	<!-- end contact form -->









<?php
include "footer.php";
?>            