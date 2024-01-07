<?php 
include "header.php"; 
?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Account Settings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Your Personal Info</h2>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
<?php
 $result1 = mysqli_query($con,"SELECT * FROM users where userID='$uid'");
 if(mysqli_num_rows($result1)>0){
    $row = mysqli_fetch_array($result1);
        
?>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="" name="fname" value="<?php echo $row['firstName'] ?>">
                                            <label for="name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="" name="lname" value="<?php echo $row['lastName'] ?>">
                                            <label for="name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="subject" placeholder="" name="email" value="<?php echo $row['email'] ?>">
                                            <label for="subject">Email-address</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="message" placeholder="" name="phone" value="<?php echo $row['phone'] ?>">
                                            <label for="message">Phone Number</label>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-title">
						            <h2>Change your password</h2>
					                </div>
                                    <form action="change-password.php" method="POST" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="message" placeholder="" name="cpass">
                                            <label for="message">Current Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="message" placeholder="" name="npass1">
                                            <label for="message">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="message" placeholder="" name="npass2">
                                            <label for="message">Re-type new password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Change password</button>
                                    </div>
                                </div>
                            </form>
                            
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->






  <?php
  include "footer.php"
  ?>