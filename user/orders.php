<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Orders</li>
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
                                            <th>Order Date & Time</th>                                           
                                            <th>Order Details</th>
                                            <th>Total Price</th>
                                            <th>Order Status</th>
                                            <th>Cancel Order</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
<?php
$result1 = mysqli_query($con,"SELECT * FROM orders Where userID='$uid' ORDER BY ordering_time DESC");
if(mysqli_num_rows($result1)>0){ $i=1;
        while($row1 = mysqli_fetch_array($result1)){
        $oid = $row1['orderID'];
        $nbr = $row1['numberOfItems'];
        $s = $row1['order_status'];
        if($s == 0) {$stts = "Pending";}
        else if($s == 1) {$stts = "Delivered";}
        else if($s == 2) {$stts = "Canceled";}
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
                                            <td><?php echo $row1['ordering_time'] ?></td>
                                            <td><table class="table table-bordered">

        <?php
        $fids = unserialize($row1["foodID"]);
        $prices = unserialize($row1["price"]);
        $qttys= unserialize($row1["qtty"]);
   
        for($j=0; $j<$nbr; $j++){
        $fid = $fids[$j]; 
        $price = $prices[$j];
        $qtty = $qttys[$j];
        $result2 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
        $row2 = mysqli_fetch_array($result2);
        $name = $row2['name'];
        ?>
                                           
                                          <tr><td><img src="../foods-pics/<?php echo $row2['picture'] ?>" style="height:65px; width:60px; ">
                                            Food Name: <?php echo $name ?></td> 
                                          <td>Price: $<?php echo $price ?> </td>
                                          <td>Quantity: <?php echo $qtty ?></td>
                                        </tr>
        <?php } ?>
                                        </table></td>

                                            <td>$<?php echo $row1['discountedPrice'] ?></td>
                                            <td><?php echo $stts ?></td>
        <?php if($s == 0){ ?>                                   
                                            <td><a href="cancel-order.php?oid=<?php echo $row1['orderID'] ?>">
                                            <i class="fa fa-trash"></i></a></td>
        <?php } else if($s==2) { ?>                   
                                            <td style="color:red"><i class="fa fa-times"></i></td> 
        <?php } else {?>               
                                            <td style="color:green"><i class="fa fa-check"></i></td>
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Order Date & Time</th>                                           
                                            <th>Order Details</th>
                                            <th>Total Price</th>
                                            <th>Order Status</th>
                                            <th>Cancel Order</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
<?php
$result1 = mysqli_query($con,"SELECT * FROM order_deals Where userID='$uid' ORDER BY ordering_time DESC");
if(mysqli_num_rows($result1)>0){ $i=1;
        while($row1 = mysqli_fetch_array($result1)){
        $oid = $row1['orderID'];
        $did = $row1['dealID'];
        $qtty = $row1['qtty'];
        $s = $row1['status'];
        $price = $row1['totalPrice'];
        if($s == 0) {$stts = "Pending";}
        else if($s == 1) {$stts = "Delivered";}
        else if($s == 2) {$stts = "Canceled";}
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
                                            <td><?php echo $row1['ordering_time'] ?></td>
                                            <td><table class="table table-bordered">

        <?php
        $result2 = mysqli_query($con,"SELECT * FROM deals Where dealID='$did'");
        $row2 = mysqli_fetch_array($result2);
        $named = $row2['name'];
        $fid = $row2['foodID'];
        $result3 = mysqli_query($con,"SELECT * FROM menu Where foodID='$fid'");
        $row3 = mysqli_fetch_array($result3);
        $namef = $row3['name'];
        ?>
                                           
                                          <tr><td><img src="../deals-pics/<?php echo $row2['picture'] ?>" style="height:65px; width:60px; ">
                                            <?php echo $named ?>: <?php echo $namef ?></td> 
                                          <td>Quantity: <?php echo $qtty ?></td>
                                        </tr>
        
                                        </table></td>

                                            <td>$<?php echo $price ?></td>
                                            <td><?php echo $stts ?></td>
        <?php if($s == 0){ ?>                                   
                                            <td><a href="cancel-order.php?oid=<?php echo $row1['orderID'] ?>">
                                            <i class="fa fa-trash"></i></a></td>
        <?php } else if($s==2) { ?>                   
                                            <td style="color:red"><i class="fa fa-times"></i></td> 
        <?php } else {?>               
                                            <td style="color:green"><i class="fa fa-check"></i></td>
        <?php } ?>
                                        </tr>
<?php
 $i++;}}

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