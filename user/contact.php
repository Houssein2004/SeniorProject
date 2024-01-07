<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Restaurant</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>


            <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-12">
                        <div class="row g-3">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php
 $result1 = mysqli_query($con,"SELECT * FROM messages where userID='$uid'");
 if(mysqli_num_rows($result1)>0){
     while($row = mysqli_fetch_array($result1)){
        
?>                                
                                <tr>
                                    <td style="color:#FE9b27">You: <?php echo $row['msg'] ?>
                                    <small style="float:right"><?php echo $row['date'] ?> <?php echo $row['time'] ?></small></td>
                                </tr>
                                <tr>
                                    <td>Restaurant: <?php echo $row['reply'] ?>
                                    <small style="float:right"><?php echo $row['replyDate'] ?> <?php echo $row['replyTime'] ?></small></td>
                                </tr>
<?php }} ?>                               
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="row g-3">
                        <form action="send-message.php" method="POST">
                            <textarea type="text" class="form-control" name="msg" placeholder="Type your message here..."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="row g-3">    
                            <button type="submit" class="btn-plus btn btn-primary p-3"><i class="fa fa-paper-plane"></i></button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


<?php            
include "footer.php";
?>