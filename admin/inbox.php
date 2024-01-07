<?php
include "header.php";
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Inbox</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Inbox</li>
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
                                            <th>From</th>
                                            <th>Message</th>
                                            <th>Reply</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
<?php
$result1 = mysqli_query($con,"SELECT * FROM messages");
if(mysqli_num_rows($result1)>0){ $i=1;
        while($row1 = mysqli_fetch_array($result1)){
        $msgID = $row1['msgID'];
        $uid = $row1['userID'];
            $result2 = mysqli_query($con,"SELECT * FROM users WHERE userID = '$uid'");
            $row2 = mysqli_fetch_array($result2);
        $reply = $row1['reply'];
        if($reply == ""){
        ?>
                                            <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row2['firstName'] ?> <?php echo $row2['lastName'] ?></td>
                                            <td><?php echo $row1['msg'] ?><small style="color:#FE9b27; float:right"><?php echo $row1['date'] ?> <?php echo $row1['time'] ?></small></td>
                                            <td><form action="send-reply.php?msgID=<?php echo $msgID ?>" method="POST">
                                                <div class="input-group mb-3">
                                                    <textarea class="form-control" name="reply" placeholder="Reply here..." aria-label="Recipient's username" aria-describedby="button-addon2"></textarea>
                                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-paper-plane"></i></button>
                                                </div>   
                                            </form>
                                            </td>
                                        </tr>
<?php } else { ?>
    <tr>
                                            <td style="background-color:green; color:#fff"><?php echo $i ?></td>
                                            <td><?php echo $row2['firstName'] ?> <?php echo $row2['lastName'] ?></td>
                                            <td><?php echo $row1['msg'] ?><small style="float:right"><?php echo $row1['date'] ?> <?php echo $row1['time'] ?></small><br>
                                            <span style="color:green">Reply: <?php echo $row1['reply'] ?><small style="float:right"><?php echo $row1['replyDate'] ?> <?php echo $row1['replyTime'] ?></small></span>
                                                </td>
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