<?php
    include '../conn/conn.php';

    if(isset($_POST['submit'])){
        $tcode=trim($_POST['tcode']);
        $tname=trim($_POST['tname']);
        $vial=trim($_POST['vial']);
        $tcp=trim($_POST['tcp']);
        $trate=trim($_POST['trate']);

        // echo $vial;
        // echo $tname;

        if(empty($tcode) || empty($tname) || empty($vial) || empty($tcp) || empty($trate))
        {
            echo '<script>alert("Please fill up the empty fields..");</script>' ;
            header("location:../../tests.php");
        }
        else{

            $insertquery = "insert into tests(tcode,tname,vial_type,c_price,s_price) values('$tcode','$tname','$vial','$tcp','$trate')";
            if(mysqli_query($con,$insertquery))
            {
                echo"<h3>Data Inserted</h3>";
                header("location:../../tests.php");
            }
        }
    }
?>