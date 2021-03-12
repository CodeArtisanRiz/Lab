<?php

include '../conn/conn.php';

$val = $_GET['selectvalue'];


$selectquery = "SELECT * from profile";

$query = mysqli_query($con,$selectquery);


if($val=="Centre Visit"){
    $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
            $returnCode = $res['report_centre_collection'];
        }
    }
    else if($val=="Email"){
        $nums = mysqli_num_rows($query);
            while($res = mysqli_fetch_array($query)){
                $returnCode = $res['report_email'];
            }
        }
    else if($val=="Home"){
        $nums = mysqli_num_rows($query);
            while($res = mysqli_fetch_array($query)){
                $returnCode = $res['report_home_delivery'];
            }
        }

    echo $returnCode;
?>