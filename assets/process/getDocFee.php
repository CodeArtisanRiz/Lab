<?php

include '../conn/conn.php';


$val = $_GET['selectvalue'];

//$val = 'Hello7';

$selectquery = " SELECT * from doctor where dname= '$val' ";

$query = mysqli_query($con,$selectquery);

$nums = mysqli_num_rows($query);

    while($res = mysqli_fetch_array($query)){
        //echo $res['tcode'];
        $returnCode = $res['refcent'];
        // $returnPrice = $res['s_price'];
    }

// $returnval = $returnCode . "~" .$returnPrice;   //concatenating two variables in single variable.

// echo $returnval;
echo $returnCode;

?>