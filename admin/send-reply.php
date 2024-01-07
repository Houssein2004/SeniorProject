<?php 
require_once 'conx.php';
$msgID = $_GET['msgID'];

if(isset($_POST['reply'])){

$reply = $_POST['reply'];

$date = date("Y-m-d");
$time = date("H:i:s");

$sql = "UPDATE messages SET reply='$reply', replyDate='$date',replyTime='$time' WHERE msgID='$msgID'";
$result_update= mysqli_query($con,$sql);
header("location:inbox.php");
}
?>