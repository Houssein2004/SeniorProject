<?php 
require_once "conx.php";
if(isset($_POST['name']) && isset($_POST['discount']) && isset($_POST['foodName'])){

$did = uniqid (rand(1,8));
$name = $_POST['name'];
$foodName = $_POST['foodName'];
$discount = $_POST['discount'];
$eDate = $_POST['eDate'];
$sDate = $_POST['sDate'];
$description = $_POST['description'];

$pic = $_FILES['pic']['name'];
$picTmp = $_FILES['pic']['tmp_name'];
move_uploaded_file($picTmp,"../deals-pics/".$pic);

$sql_add_query = "INSERT INTO deals VALUES ('$did','$name','$foodName','$discount','$pic','$sDate','$eDate','$description')";
$result= mysqli_query($con,$sql_add_query);

    header("location:home.php");
}
?>