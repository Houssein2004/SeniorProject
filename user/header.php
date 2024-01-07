<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];
$result = mysqli_query($con,"SELECT * FROM users WHERE userID='$uid'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>House of Food</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/boot.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/s1.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                     <img src="../img/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="home.php" class="nav-item nav-link">Home</a>
                        <a href="menu.php" class="nav-item nav-link">Our Menu</a>
                        <a href="orders.php" class="nav-item nav-link">Your Orders</a>
                        <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                        <?php
                        $result1 = mysqli_query($con,"SELECT * FROM cart Where userID='$uid' AND dealID=0");
                        $result2 = mysqli_query($con,"SELECT * FROM deals");
                        ?>
                        <a href="cart.php" class="nav-item nav-link"><i class="fas fa-shopping-cart"></i> (<?php echo mysqli_num_rows($result1) ?>)</a>
                        <a href="deals.php" class="nav-item nav-link"><i class="fas fa-tag"></i> (<?php echo mysqli_num_rows($result2) ?>)</a>
                    </div>
                    <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                            <div class="dropdown-menu m-0">
                                <a href="account-settings.php" class="dropdown-item">Account Settings</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                    </div>
                </div>
            </nav>