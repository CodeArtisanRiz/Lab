
<?php

if(isset($_POST['updatePatient'])){

    $submitId=($_POST['mPatientId']);
    echo $postId;
    $submitTotal=trim($_POST['mPatientTotal']);
    $RA=trim($_POST['mPatientRA']);
    $submitAD=trim($_POST['mPatientAD']);
    $submitPA=trim($_POST['mPatientPA']);

    $submitRA= trim($_POST['mPatientPA']);

    $discount = trim($_POST['hiddenInputD']);
    $totalDiscount = $submitAD + $discount;
    $netTotal = trim($_POST['hiddenInputNT']);
    $submitNT = $netTotal - $submitAD;

        // $update = " UPDATE patients SET netTotal='$submitNT', remainingAmt='$submitRA', discount='$totalDiscount', paid_later='$submitPA' WHERE pid='$submitId' ";
        $update = " UPDATE patients SET netTotal='$submitNT', remainingAmt='$submitRA', discount='$totalDiscount' WHERE pid='$submitId' ";
        $res = mysqli_query($con,$update);

        if($res){
            echo '<script>alert("Record Updated..");</script>' ;
            ?>
            <script>
            window.location.replace("patient-list.php");
            </script>
            <?php
        }
        else{
            echo '<script>alert("Error. Record Not Updated..");</script>' ;
        }

    }
?>