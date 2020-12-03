<?php 

    include 'assets/conn/conn.php';

    // Sample code for adding records from a single row in a table
    
    $count = mysqli_query($con, "SELECT refcent FROM doctor");
    $total = 0;
    while($row = mysqli_fetch_assoc($count)) {
        $total += $row['refcent'];
    }
    echo $total;

?>