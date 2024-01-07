<?php
require_once 'conx.php';

$fid=$_GET['fid'];

$sql = "DELETE FROM menu WHERE foodID='$fid'";
        mysqli_query($con, $sql);
        echo "<script>
        alert('Food Deleted!');
        window.open('menu.php','_self');
        </script>"; 

?>