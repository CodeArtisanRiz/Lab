<?php
    $con=mysqli_connect('localhost','root','','pathology');
    
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }

    if(isset($_POST['submit'])){
        $dname=$_POST['dname'];
        $qualification=$_POST['qualification'];
        $specialization=$_POST['specialization'];
        $mobile=$_POST['phone'];
        $refcent=$_POST['refcent'];

        $insertquery = "insert into doctor(dname,mobile,quali,special,refcent) values('$dname','$mobile','$qualification','$specialization','$refcent')";
        if(mysqli_query($con,$insertquery))
        {
            // echo"<h3>Data Inserted</h3>";
            header("location:../../doc.php");
            exit();
        }
    }
?>