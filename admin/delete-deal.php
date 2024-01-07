<?php
require_once 'conx.php';

$did=$_GET['did'];

$sql = "DELETE FROM menu WHERE dealID='$did'";
        mysqli_query($con, $sql);
        echo "<script>
        alert('Deal Deleted!');
        window.open('deals.php','_self');
        </script>"; 

?>