<?php
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];

    if(isset($_POST['ccode'])){
        $ccode = $_POST['ccode'];

        $result = mysqli_query($con,"SELECT * FROM users Where coupon_code='$ccode'");
        if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $discount = $row['discount'];
                echo "<script>
                        window.open('cart.php?discount=$discount','_self');
                            </script>"; 
                }
                else{
                    echo "<script>
                    alert('Wrong coupon code');
                    window.open('cart.php','_self');
                </script>"; 
                }
            }


?>