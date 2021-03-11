<?php

include '../conn/conn.php';

$val = $_GET['selectvalue'];


$selectquery = "SELECT * from profile";

$query = mysqli_query($con,$selectquery);


if($val=="Home Collection"){
$nums = mysqli_num_rows($query);
    while($res = mysqli_fetch_array($query)){
        $returnCode = $res['home_collection'];
    }
}
else if($val=="Centre Collection"){
    $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
            $returnCode = $res['centre_collection'];
        }
    }

    echo $returnCode;
?>