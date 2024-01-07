<?php 
session_start();
require_once 'conx.php';
$uid = $_SESSION['uid'];

if(isset($_POST['msg'])){

$msg = $_POST['msg'];
$msg_id = uniqid (rand(1,8));

$date = date("Y-m-d");
$time = date("H:i:s");

$reply = "";
$replyDate = 0000-00-00;
$replyTime = strtotime('00:00:00');

$sql_add_query = "INSERT INTO messages VALUES ('$msg_id','$uid','$msg','$date','$time','$reply','$replyDate','$replyTime')";
$result= mysqli_query($con,$sql_add_query);

header("location:contact.php");
}
?>