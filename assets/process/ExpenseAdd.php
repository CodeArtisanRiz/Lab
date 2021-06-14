<?php
    include '../conn/conn.php';

    if(isset($_POST['submit'])){
        $ename=trim($_POST['e_name']);
        $eamount=trim($_POST['e_amount']);
        

        if(empty($ename) || empty($eamount))
        {
            echo '<script>alert("Please fill up the empty fields..");</script>' ;
            header("location:../../expense.php");
        }
        else{

            $insertquery = "insert into expense(e_name,e_amount) values('$ename','$eamount')";
            if(mysqli_query($con,$insertquery))
            {
                // echo"<h3>Data Inserted</h3>";
                header("location:../../expense.php");
            }
        }
    }
?>