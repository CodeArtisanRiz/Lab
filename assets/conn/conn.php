<?php
//      localhost
     $con=mysqli_connect('localhost','root','','pathology');
//      server
    // $con=mysqli_connect('localhost','u478474012_techno3gamma','Brainkraft1@','u478474012_lab');
        
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>