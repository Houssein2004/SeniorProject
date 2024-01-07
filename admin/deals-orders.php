<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders for Deals</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Upcoming Orders for Deals</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>User Info</th>
                                            <th>Address</th>
                                            <th>Total Price</th>
                                            <th>Order Date & Time</th>                                           
                                            <th>Order Details</th>
                                            <th>Order Status</th>
                                            <th>Confirm Order</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
<?php
$result1 = mysqli_query($con,"SELECT * FROM order_deals Where status!= 3 ORDER BY ordering_time DESC");
if(mysqli_num_rows($result1)>0){ $i=1;
        while($row1 = mysqli_fetch_array($result1)){
        $oid = $row1['orderID'];
        $uid = $row1['userID'];                    
        $did = $row1['dealID'];
        $s = $row1['status'];
        $qtty = $row1['qtty'];
        $price = $row1['totalPrice'];
        if($s == 0) {$stts = "Pending";}
        else if($s == 1) {$stts = "Delivered";}
        else if($s == 2) {$stts = "Canceled";}
         $result2 = mysqli_query($con,"SELECT * FROM users WHERE userID = '$uid'");
            $row2 = mysqli_fetch_array($result2);   
            
            $result3 = mysqli_query($con,"SELECT * FROM deals Where dealID='$did'");
        $row3 = mysqli_fetch_array($result3);
        $named = $row3['name'];
        $fid = $row3['foodID'];
        $result4 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
        $row4 = mysqli_fetch_array($result4);
        $namef = $row4['name'];
        ?>
                                            <tr>
                                            <?php if($s==0){?>   
                                            <td><?php echo $i ?></td>
                                            <?php } else if($s==1) {?>
                                            <td style="background-color:green; color:#fff"><?php echo $i ?></td>
                                            <?php } else {?>
                                            <td style="background-color:red; color:#fff"><?php echo $i ?></td>
                                            <?php } ?>
                                            <td><?php echo $oid ?></td>
                                            <td>User ID: <?php echo $uid ?><br>
                                                Name: <?php echo $row2['firstName'] ?> <?php echo $row2['lastName'] ?><br>
                                                Phone: <?php echo $row2['phone'] ?>
                                            </td>
                                            <td><?php echo $row1['city'] ?>, <?php echo $row1['street'] ?>, <?php echo $row1['building'] ?></td>
                                            <td>$<?php echo $row1['totalPrice'] ?></td>
                                            <td><?php echo $row1['ordering_time'] ?></td>
                                            <td><?php echo $named ?>: <?php echo $namef ?><br>Quantity: <?php echo $qtty ?></td> 
                                           <td><?php echo $stts ?></td>
                                           <?php if($s==0){?>   
                                            <td><a href="update-order-deals-stts.php?oid=<?php echo $row1['orderID'] ?>">
                                            <i class="fa fa-check"></i></a></td>
                                            <?php } else if($s==1) {?>
                                            <td style="background-color:green; color:#fff">Confirmed</td>
                                            <?php } else {?>
                                            <td style="background-color:red; color:#fff">Canceled</td>
                                            <?php } ?>
                                                                  
                                        </tr>
<?php
 $i++;}
}

    else{
        echo "No orders"; 
    }?>
                                    </tbody>
                                </table>
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