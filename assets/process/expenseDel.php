<?php

    include '../conn/conn.php';

    $e_id = $_REQUEST['e_id'];

    $query = "DELETE FROM expense WHERE e_id=$e_id"; 

    $result = mysqli_query($con,$query) or die ( mysqli_error());

    header("location:../../expense.php");
?>
