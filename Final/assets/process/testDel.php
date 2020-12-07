<?php

    include '../conn/conn.php';

    $ids = $_REQUEST['ids'];

    $query = "DELETE FROM tests WHERE tid=$ids"; 

    $result = mysqli_query($con,$query) or die ( mysqli_error());

    header("location:../../tests.php");
?>
