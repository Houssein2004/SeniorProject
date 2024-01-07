<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Discounts & Offers</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Discounts & Offers</li>
                        </ol>
                    </nav>
                </div>
            </div>


<!-- Team Start -->
<div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Deals</h5>
                    <h1 class="mb-5">Our Best Offers</h1>
                </div>
                <div class="row g-4">
<?php
$result1 = mysqli_query($con,"SELECT * FROM deals");
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_array($result1)){
        $fid = $row1['foodID'];
        $discount = $row1['discount'];
        $result2 = mysqli_query($con,"SELECT * FROM menu WHERE foodID='$fid'");
               $row2 = mysqli_fetch_array($result2);
               $price = $row2['price'];
               $newPrice = $price - $price*$discount/100;


?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <h5><?php echo $row1['name'] ?></h5>
                            <div class="rounded-circle overflow-hidden m-4 mt-0">
                                <img class="img-fluid" src="../deals-pics/<?php echo $row1['picture'] ?>" alt="">
                            </div>
                            <h5 class="mb-0"><?php echo $row2['name'] ?> 
                            <br>
                            <small style="text-decoration:line-through"><?php echo $row2['price'] ?>$</small>
                            <span style="background-color:#FE9b27; color:#fff;"> <?php echo $newPrice ?>$</span></h5>
                            <small style="color:#FE9b27">From <?php echo $row1['startDate'] ?><br>To <?php echo $row1['endDate'] ?></small>
                            <br><small><?php echo $row1['description'] ?></small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-primary mx-5" href="cart-deal.php?did=<?php echo $row1['dealID'] ?>"><i class="fa fa-shopping-bag"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
<?php }} ?>
                </div>
            </div>
        </div>
        <!-- Team End -->



<?php
include "footer.php";
?>