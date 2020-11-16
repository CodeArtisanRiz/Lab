<?php

    include '../conn/conn.php';

    $ids = $_REQUEST['ids'];

    $query = "DELETE FROM doctor WHERE did=$ids"; 

    $result = mysqli_query($con,$query) or die ( mysqli_error());

    header("location:../../doc.php");
?>