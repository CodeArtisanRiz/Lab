<?php
    include '../conn/conn.php';

    if(isset($_POST['submit'])){
        $dname=trim($_POST['dname']);
        $qualification=trim($_POST['qualification']);
        $specialization=trim($_POST['specialization']);
        $mobile=trim($_POST['phone']);
        $refcent=trim($_POST['refcent']);

        if(empty($dname))
        {
            echo '<script>alert("Please fill up the empty fields..");</script>' ;
            header("location:../../doc.php");
        }
        else{

            $insertquery = "insert into doctor(dname,mobile,quali,special,refcent) values('$dname','$mobile','$qualification','$specialization','$refcent')";
            if(mysqli_query($con,$insertquery))
            {
                header("location:../../doc.php");
            }
        }
    }
?>