<?php 
    $con=mysqli_connect('localhost','root','','pathology');
        
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>