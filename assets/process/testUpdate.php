<?php
    if(isset($_POST['updateTest'])){

        $testUId=trim($_POST['testUpdateID']);
        $testUCode=trim($_POST['testUpdateTC']);
        $testUName=trim($_POST['testUpdateTN']);
        $testUVT=trim($_POST['testUpdateVT']);
        $testUCP=trim($_POST['testUpdateCP']);
        $testURate=trim($_POST['testUpdateRate']);

            $update = "UPDATE tests SET tcode='$testUCode', tname='$testUName', vial_type='$testUVT', c_price='$testUCP', s_price='$testURate' WHERE tid='$testUId' ";
            $res = mysqli_query($con, $update);
             if($res){
                // echo '<script>alert("Test Updated..");</script>' ;
                ?>
                <script>
                window.location.replace("tests.php");
                </script>
                <?php
            }
            else{
                echo '<script>alert("Error.. Test not Updated..");</script>' ;
            }

        }
?>