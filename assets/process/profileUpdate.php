
<?php

if(isset($_POST['updateProfile'])){

    $sLabId=($_POST['labId']);
    echo $postId;
    $sLabName=trim($_POST['labName']);
    $sCentreName=trim($_POST['centreName']);
    $sUhid=trim($_POST['uhid']);
    $sGstin=trim($_POST['gstin']);
    $sAddress=trim($_POST['address']);
    $sPhone = trim($_POST['phone']);
    $sPickup = trim($_POST['pickup']);
    $sDelivery =trim($_POST['delivery']);;

        $update = " UPDATE profile SET lab_name = '$sLabName', centre_name='$sCentreName', centre_uhid='$sUhid', centre_GSTIN='$sGstin', centre_address='$sAddress', centre_phone ='$sPhone', pickup='$sPickup', delivery='$sDelivery' WHERE cid='$sLabId' ";
        $res = mysqli_query($con, $update);

        if($res){
            // echo '<script>alert("Record Updated..");</script>' ;
            ?>
            <script>
            window.location.replace("profile.php");
            </script>
            <?php
        }
        else{
            echo '<script>alert("Error. Record Not Updated..");</script>' ;
        }

    }
?>