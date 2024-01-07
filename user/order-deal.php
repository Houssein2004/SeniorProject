<?php
include "header.php";
$did = $_GET['did'];
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Order Deal</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">                           
                    <form action="add-order-deal.php?did=<?php echo $did ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-title">
						<h2>Your Address</h2>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
                                <div class="row g-3">
                                <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="message" placeholder="City" name="city">
                                            <label for="message">City</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Street" name="street">
                                            <label for="name">Street</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Building" name="building">
                                            <label for="subject">Building</label>
                                        </div>
                                    </div>
                                    <div class="form-title">
						                <h2>Your Payment Method</h2>
					                </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="radio"  id="1" value="cash on delivery" placeholder="" name="payment_method"> Cash on delivery
                                            <br>
                                            <input type="radio"  id="2" value="credit card" placeholder="" name="payment_method"> Credit Card
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                        <input type="number" class="form-control" id="subject" placeholder="Card Number" name="card_number">
                                        <label for="subject">Card Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                        <input type="date" class="form-control" id="subject" placeholder="Card Expiry Date" name="card_date">
                                        <label for="subject">Card Expiry Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-btn" >
                                        <br><button class="btn btn-primary w-100 py-3" type="submit">Place Order</button>
                                        </div></form>
                            
					</div>
				</div>
                <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Your Order Details</h1>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                        <tr>
                                            <th></th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
<?php
$result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' AND foodID=0");
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_array($result1)){
        $did = $row1['dealID'];
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
               $total = $newPrice*$qtty;
?>
                                            
                                        <tr><td><?php echo $row2['name'] ?>: <?php echo $row3['name'] ?></td><td>$<?php echo $newPrice ?></td></tr>
                                        <tr><td>Quantity</td>
                                        <td><form action="update-qtty-deal.php?cartid=<?php echo $row1['cartID'] ?>" method="POST">
                                            <input  style="width:100px" class="form-control mb-2" type="number" value="<?php echo $row1['qtty'] ?>" name="qtty" readonly>      
                                            <button type="submit" class="btn-minus btn btn-primary" name="minus"><i class="fa fa-minus"></i></button>
                                            <button type="submit" class="btn-plus btn btn-primary" name="plus"><i class="fa fa-plus"></i></button>
                                            </form></td></tr>
                                        <tr><td>Delivery Price</td><td>$5</td></tr>
                                        <tr><td>Total</td><td>$<?php echo $total+5 ?></td></tr>
<?php }}}}?>
                                    </tbody>                                                                     
                                    </table>    
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div></form>
            </div>
        </div>
	</div>
	<!-- end contact form -->









<?php
include "footer.php";
?>            