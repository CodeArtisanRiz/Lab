<?php 
    $con=mysqli_connect('localhost','root','','pathology');
        
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
//     else
//         echo '<script>alert("Welcome, Your Connection has been Established ! !");</script>' ;
?>