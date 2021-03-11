<?php
include '../../assets/conn/conn.php';

$patient_id = $_GET['id'];
$patientQuery = "SELECT * FROM patients WHERE pid = $patient_id";
$pQuery = mysqli_query($con, $patientQuery);
while($res = mysqli_fetch_assoc($pQuery)){
	$date = $res['date'];
	$time = $res['time'];
	$patientName = $res['pname'];
	$age = $res['age'];
	$sex = $res['sex'];
	$patientAddress = $res['paddress'];
	$patientPhone = $res['mobile'];
	$referralDoc = $res['referredBy'];
	$total = $res['total'];
	$discount = $res['discount'];
	$netTotal = $res['netTotal'];
	$testNames = $res['tName'];
	$testCodes = $res['tCode'];
    $testRates = $res['tPrice'];
    $remainingAmount = $res['remainingAmt'];
    $paidLater = $res['paid_later'];
    $currentDate = date("Y/m/d");
}

echo $remainingAmount;
echo $total;
echo $paidLater;
$r=0;


$update = " UPDATE patients set remainingAmt='$r', paid_later='$remainingAmount', finalize_date = '$currentDate', payment_status = 'clear' WHERE pid='$patient_id' ";
                                    
            $res = mysqli_query($con, $update);

            if($res){
                echo '<script>alert("Record Updated..");</script>' ;
                ?>
                
                <script>
                window.location.replace("../../patient-list.php");
                </script>
                
                <?php
                }
            else{
                echo '<script>alert("Error. Record Not Updated..");</script>' ;
            }
?>
