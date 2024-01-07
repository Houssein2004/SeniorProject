<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Our Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>



            <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                       <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Burger</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <i class="fas fa-pizza-slice fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Pizza</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <i class="fas fa-drumstick-bite  fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Sandwiches <br> & Meals</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-4">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Drinks</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-5">
                            <i class="fas fa-cheese fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Sweets</h6>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

<!-- tab 1 -->
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php 
                                $result1 = mysqli_query($con,"SELECT * FROM menu where category='Burger'");
                                if(mysqli_num_rows($result1)>0){
                                    while($row = mysqli_fetch_array($result1)){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" style="height:130px; width:100px"
                                        src="../foods-pics/<?php echo $row['picture'] ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['name'] ?></span>
                                                <span class="text-primary">$<?php echo $row['price'] ?></span>
                                            </h5>
                                            <a href="add-to-cart.php?fid=<?php echo $row['foodID'] ?>" class="fst-italic"><i class="fa fa-shopping-cart" ></i>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }} else {echo "No food available now";} ?>
                            </div>
                        </div>   
<!-- tab 2 -->
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $result1 = mysqli_query($con,"SELECT * FROM menu where category='Pizza'");
                                if(mysqli_num_rows($result1)>0){
                                    while($row = mysqli_fetch_array($result1)){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" style="height:130px; width:100px"
                                        src="../foods-pics/<?php echo $row['picture'] ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['name'] ?></span>
                                                <span class="text-primary">$<?php echo $row['price'] ?></span>
                                            </h5>
                                            <a href="add-to-cart.php?fid=<?php echo $row['foodID'] ?>" class="fst-italic"><i class="fa fa-shopping-cart" ></i>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }} else {echo "No food available now";} ?>
                            </div>
                        </div>

<!-- tab 3 -->                        
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $result1 = mysqli_query($con,"SELECT * FROM menu where category='Sandwiches'");
                                if(mysqli_num_rows($result1)>0){
                                    while($row = mysqli_fetch_array($result1)){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" style="height:130px; width:100px"
                                        src="../foods-pics/<?php echo $row['picture'] ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['name'] ?></span>
                                                <span class="text-primary">$<?php echo $row['price'] ?></span>
                                            </h5>
                                            <a href="add-to-cart.php?fid=<?php echo $row['foodID'] ?>" class="fst-italic"><i class="fa fa-shopping-cart" ></i>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }} else {echo "No food available now";} ?>
                            </div>
                        </div>
<!-- tab 4 -->
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $result1 = mysqli_query($con,"SELECT * FROM menu where category='Drinks'");
                                if(mysqli_num_rows($result1)>0){
                                    while($row = mysqli_fetch_array($result1)){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" style="height:130px; width:100px"
                                        src="../foods-pics/<?php echo $row['picture'] ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['name'] ?></span>
                                                <span class="text-primary">$<?php echo $row['price'] ?></span>
                                            </h5>
                                            <a href="add-to-cart.php?fid=<?php echo $row['foodID'] ?>" class="fst-italic"><i class="fa fa-shopping-cart" ></i>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }} else {echo "No food available now";} ?>
                            </div>
                        </div>
<!-- tab 5 -->
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php 
                                $result1 = mysqli_query($con,"SELECT * FROM menu where category='Sweets'");
                                if(mysqli_num_rows($result1)>0){
                                    while($row = mysqli_fetch_array($result1)){
                                ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" style="height:130px; width:100px"
                                        src="../foods-pics/<?php echo $row['picture'] ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['name'] ?></span>
                                                <span class="text-primary">$<?php echo $row['price'] ?></span>
                                            </h5>
                                            <a href="add-to-cart.php?fid=<?php echo $row['foodID'] ?>" class="fst-italic"><i class="fa fa-shopping-cart" ></i>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }} else {echo "No food available now";} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php 
include "footer.php";
?>

