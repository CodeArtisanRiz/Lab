<?php
    if(isset($_POST['updateExpense'])){

        $exUID=trim($_POST['exUpdateID']);
        $exUName=trim($_POST['exUpdateName']);
        $exUAmount=trim($_POST['exUpdateAmount']);

            $update = "UPDATE expense SET e_name='$exUName', e_amount='$exUAmount' WHERE e_id='$exUID' ";
            $res = mysqli_query($con, $update);
             if($res){
                // echo '<script>alert("Test Updated..");</script>' ;
                ?>
                <script>
                window.location.replace("expense.php");
                </script>
                <?php
            }
            else{
                echo '<script>alert("Error.. Doc not Updated..");</script>' ;
            }

        }
?>