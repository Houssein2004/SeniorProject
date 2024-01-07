<?php 
require_once "conx.php";
if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category'])){

$fid = uniqid (rand(1,8));
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];

$pic = $_FILES['pic']['name'];
$picTmp = $_FILES['pic']['tmp_name'];
move_uploaded_file($picTmp,"../foods-pics/".$pic);

$sql_add_query = "INSERT INTO menu VALUES ('$fid','$name','$category','$price','$pic')";
$result= mysqli_query($con,$sql_add_query);

    header("location:home.php");
}
?>