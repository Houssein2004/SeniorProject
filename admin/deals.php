<?php 
include "header.php"; 
?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Deals</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">All Deals</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Available Deals</h5>
                    
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="tab-content">

<!-- tab 1 -->
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php 
                                $result1 = mysqli_query($con,"SELECT * FROM deals");
                                if(mysqli_num_rows($result1)>0){
                                    $current_date = date('Y-m-d');
                                    while($row = mysqli_fetch_array($result1)){
                                        $endDate = $row['endDate'];
?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" style="height:250px; width:150px"
                                        src="../deals-pics/<?php echo $row['picture'] ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['name'] ?></span>
                                                <span class="text-primary"><?php echo $row['discount'] ?>%</span>
                                            </h5>
                                            <p><?php echo $row['description'] ?></p>
                                            <p>From: <?php echo $row['startDate'] ?> To: <?php echo $row['endDate'] ?></p>
                                            <a href="edit-deal.php?did=<?php echo $row['dealID'] ?>" class="fst-italic"><i class="fa fa-edit" ></i>Edit</a>
                                            <a href="delete-deal.php?did=<?php echo $row['dealID'] ?>" style="color:red" class="fst-italic"><i class="fa fa-trash" ></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php }} else {echo "No deals available now";} ?>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>

            
<!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="home.php">House of Food</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                Senior Project - Fall 2023 - Houssein Mahdi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>