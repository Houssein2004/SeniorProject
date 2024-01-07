<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Users</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Manage Users</li>
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
                                            <th>User ID</th>
                                            <th>Full Name</th>
                                            <th>Contact Info</th>
                                            <th>User Status / Discount</th>
                                            <th>Coupon Code</th>
                                            <th>Edit Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
<?php
$result1 = mysqli_query($con,"SELECT * FROM users");
if(mysqli_num_rows($result1)>0){ $i=1;
        while($row1 = mysqli_fetch_array($result1)){
        $stts = $row1['status'];
        if($stts == 1){
        ?>
                                            <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row1['userID'] ?></td>
                                            <td><?php echo $row1['firstName'] ?> <?php echo $row1['lastName'] ?></td>
                                            <td>Phone:<?php echo $row1['phone'] ?><br>Email Address: <?php echo $row1['email'] ?></td>
                                            <td style="color:#FE9b27">Special<br><?php echo $row1['discount'] ?>%</td>
                                            <td><?php echo $row1['coupon_code'] ?></td>                                  
                                            <td><a class="btn btn-outline-primary" href="edit-user-stts.php?uid=<?php echo $row1['userID'] ?>"><i class="fa fa-edit"></i></a></td>
                                        </tr>
<?php } else { ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php $row1['userID'] ?></td>
                                            <td><?php echo $row1['firstName'] ?> <?php echo $row1['lastName'] ?></td>
                                            <td>Phone:<?php echo $row1['phone'] ?><br>Email Address: <?php echo $row1['email'] ?></td>
                                            <td>Unspecial</td>
                                            <td><?php echo $row1['coupon_code'] ?></td>                                  
                                            <td><a class="btn btn-outline-primary" href="edit-user-stts.php?uid=<?php echo $row1['userID'] ?>"><i class="fa fa-star"></i></a></td>
                                        </tr>
<?php
} $i++;}
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