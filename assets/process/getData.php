<?php

include '../conn/conn.php';


$val = $_GET['selectvalue'];

//$val = 'Hello7';

$selectquery = " SELECT * FROM tests WHERE tname= '$val' ";

$query = mysqli_query($con, $selectquery);

$nums = mysqli_num_rows($query);

    while($res = mysqli_fetch_array($query)){
        //echo $res['tcode'];
        $returnCode = $res['tcode'];
        $returnPrice = $res['s_price'];
    }

$returnval =$returnCode. "~" .$returnPrice;   //concatenating two variables in single variable.

echo $returnval;

?>