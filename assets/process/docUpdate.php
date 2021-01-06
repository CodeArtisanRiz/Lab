<?php
    if(isset($_POST['updateDoc'])){

        $doctorUID=trim($_POST['docUpdateID']);
        $docUName=trim($_POST['docUpdateName']);
        $docUQualification=trim($_POST['docUpdateQualification']);
        $docUSpecialization=trim($_POST['docUpdateSpecialization']);
        $docUPhone=trim($_POST['docUpdatePhone']);
        $docUReferral=trim($_POST['docUpdateReferral']);

            $update = "UPDATE doctor SET dname='$docUName', quali='$docUQualification', special='$docUSpecialization', mobile='$docUPhone', refcent='$docUReferral' WHERE did='$doctorUID' ";
            $res = mysqli_query($con, $update);
             if($res){
                // echo '<script>alert("Test Updated..");</script>' ;
                ?>
                <script>
                window.location.replace("doc.php");
                </script>
                <?php
            }
            else{
                echo '<script>alert("Error.. Doc not Updated..");</script>' ;
            }

        }
?>