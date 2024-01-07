<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Food Picture</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Choose Quantity</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
<?php
$result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' AND dealID=0");
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_array($result1)){
        $fid = $row1['foodID'];
            $result2 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
            if(mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_array($result2)){

?>                                      <tr>
                                            <td>
                                                <div class="img">
                                                <img src="../foods-pics/<?php echo $row2['picture'] ?>" alt="Image" style="hight:120px; width:80px">
                                                </div>
                                            </td>
                                            <td><?php echo $row2['name'] ?></td>
                                            <td><?php echo $row2['price'] ?> $</td>
                                            <td>
                                                <div class="qty">
                                            <form action="update-qtty.php?cartid=<?php echo $row1['cartID'] ?>&fid=<?php echo $row2['foodID'] ?>" method="POST">
                                            <input  style="width:100px" class="form-control mb-2" type="number" value="<?php echo $row1['qtty'] ?>" name="qtty" readonly>      
                                            <button type="submit" class="btn-minus btn btn-primary" name="minus"><i class="fa fa-minus"></i></button>
                                            <button type="submit" class="btn-plus btn btn-primary" name="plus"><i class="fa fa-plus"></i></button>
                                            </form></div>
                                            </td>
                                            <td><a href="delete-from-cart.php?cartid=<?php echo $row1['cartID'] ?>">
                                            <i class="fa fa-trash"></i></a></td>
                                        </tr>
<?php }}
    }}
    else{
        echo "Your cart is empty."; 
    }?>
                                    </tbody>
                                </table>
                            </div>
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
                                            <h1>Cart Summary</h1>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                        <tr>
                                            <th>Cart Summary</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
<?php
$result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' and dealID=0");
if(mysqli_num_rows($result1)>0){
    $subtotal=0;
    $itemsNumber = mysqli_num_rows($result1);
    
    while($row1 = mysqli_fetch_array($result1)){
        $fid = $row1['foodID'];
        $qtty=$row1['qtty'];
            $result2 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
            if(mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_array($result2)){
                    $subtotal += $row2['price']*$qtty;
                    $total = $subtotal+5;
   
             }}  
             if(isset($_GET['discount'])){
             $discount = $_GET['discount'];
             $discountedPrice = $total - ($total*$discount)/100;
             }
             else{
                $discountedPrice=$total;
             }  }           
?>
<?php 
if(isset($_GET['discount'])){ ?>
                                        <tbody class="align-middle">
                                        <tr><td>Sub Total</td><td>$<?php echo $subtotal ?></td></td></tr>
                                        <tr><td>Delivery Price</td><td>$5</td></td></tr>
                                        <tr><td>Total</td><td>$<?php echo $total ?></td></td></tr>
                                        <tr><td>Discount</td><td><?php echo $discount ?>%</td></tr>
                                        <tr><td>Total after Discount</td><td>$<?php echo $discountedPrice ?></td></td></tr>
                                    </tbody>
<?php } else {?>                                            
                                    <tbody class="align-middle">
                                        <tr><td>Sub Total</td><td>$<?php echo $subtotal ?></td></td></tr>
                                        <tr><td>Delivery Price</td><td>$5</td></td></tr>
                                        <tr><td>Total</td><td>$<?php echo $total ?></td></td></tr>
                                        <tr><td>Coupon Code</td>
                                            <td><form action="apply-coupon.php" method="POST">
                                                <input type="text" class="form-control mb-2" id="message" name="ccode">
                                                <button type="submit" class="btn btn-primary">Apply</button></form>
                                            </td></tr>
                                    </tbody>
<?php }} else { ?>
                                    <tbody class="align-middle">
                                        <tr><td>Sub Total</td><td>$<?php echo 0 ?></td></td></tr>
                                        <tr><td>Delivery Price</td><td>$0</td></td></tr>
                                        <tr><td>Total</td><td>$<?php echo 0 ?></td></td></tr>
                                        <tr><td>Coupon Code</td>
                                            <td>
                                                <input type="text" class="form-control mb-2" id="message" name="ccode">
                                                <button type="submit" class="btn btn-primary">Apply</a>
                                            </td></tr>
                                    </tbody>
<?php } ?>                                    
                                    </table>    
                                        </div>
<?php if(isset($_GET['discount'])){ ?>
                                        <div class="cart-btn" >
                                        <br><a class="btn btn-primary w-100 py-3" href="checkout.php?d=<?php echo $discount ?>">Checkout</a>
                                        </div>
<?php } else { ?>
                                        <div class="cart-btn" >
                                        <br><a class="btn btn-primary w-100 py-3" href="checkout.php">Checkout</a>
                                        </div>
<?php } ?>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->




<?php
include "footer.php";
?>           