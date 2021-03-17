<?php
include 'assets/conn/conn.php';
$patient_id = "1";
$docName = ($_GET['did']);
$year = "2021";
$month = "3";
$MonthList = array("January", "February", "March","April", "May", "June","July", "August", "September","October", "November", "December");

$patientQuery = " SELECT * from patients WHERE YEAR(finalize_date) = '$year' AND MONTH(finalize_date) = '$month' AND referredBy = '$docName' AND payment_status = 'clear'";
$result = mysqli_query($con,$patientQuery);

$docQuery = "SELECT * FROM doctor WHERE dName = '$docName'";
$dqResult = mysqli_query($con,$docQuery);
while ($res = mysqli_fetch_assoc($dqResult)){
	$docQualification = $res['quali'];
}


$centreQuery = "SELECT * FROM profile";
$cQuery = mysqli_query($con, $centreQuery);
while ($res = mysqli_fetch_assoc($cQuery)){
	$cid = $res['cid'];
	$labName = $res['lab_name'];
	$centreName = $res['centre_name'];
	$centreUhid = $res['centre_uhid'];
	$gstIN = $res['centre_GSTIN'];
	$centreAddress = $res['centre_address'];
	$centrePhone = $res['centre_phone'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Doctor Invoice</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style type="text/css" media="print">
		@page {
			/* size: auto; */
			margin: 0;
			margin-top: 50px;

		}
	</style>
		
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

      
        <!-- /Header -->

        <!-- Sidebar -->
        
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <!-- <div class="page-wrapper"> -->
            <div class="container-fluid">
			

                <!-- Invoice Container -->
                <div class="invoice-container" id="printDiv">

                    <div class="row">
                        <div class="col-sm-6 m-b-20">
                            <img alt="Logo" class="inv-logo img-fluid" src="assets/img/logo.png">
							</div>
							<div class="col-sm-6 m-b-20 ">
								<div class="invoice-details ">
									<h3 class="text-uppercase">Statement For : </h3>
									<h3 class=""><?php echo $MonthList[$month - 1];?> <?php echo $year;?></h3>
									<!-- <ul class="list-unstyled text">
										<li></li>
									</ul> -->
								</div>
							</div>
						</div>
						
						<div class="row ">
							<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20 ">
								<ul class="list-unstyled mb-0 ">
									<li><strong><?php echo $labName; ?></strong></li>
									<li><strong><?php echo $centreName; ?></strong></li>
									<li>UHID : <?php echo $centreUhid; ?></li>
									<li>GSTIN : <?php echo $gstIN; ?></li>
									<li><?php echo $centreAddress; ?></li>
									<li><?php echo $centrePhone; ?></li>
								</ul>
								
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20 ">
								<h6>Invoice to</h6>
								<ul class="list-unstyled mb-0 ">
									<li><h5 class="mb-0 "><strong>Dr. <?php echo $docName; ?></strong></h5></li>
									<li><h5 class="mb-0"><?php echo $docQualification ?></h5></li>
								</ul>
								
							</div>
						</div>
						
						<!--  -->
						<table class="table">
						<tbody class="text-center" id="tl">
							<thead class="thead-dark text-uppercase">
								<tr>
								<th scope="col">#</th>
								<th scope="col">Date</th>
								<th scope="col">Patient Name</th>
								<th scope="col">Investigations</th>
								<!-- <th scope="col">Investigation Code</th> -->
								<th scope="col">Amount</th>
								<th scope="col">Doc Fee</th>
								</tr>
							</thead>
							<?php
							// $query = " SELECT * from patients WHERE referredBy = '$docName' AND payment_status = 'clear' AND finalize_date=''";
							$index = 0;
							while($res = mysqli_fetch_assoc($result)){
								$index = $index + 1;
							?>
							
                            <div id="filter">
                                <tr class="list">
								
									<td><?php echo $index ?></td>
									<td><?php echo $res['date']; ?></td>
                                    <td><?php echo $res['pname']; ?></td>
                                    <td><?php echo $res['tName']; ?></td>
                                    <!-- <td><?php echo $res['tCode']; ?></td> -->
                                    <td><?php echo $res['total']; ?></td>
                                    <th class="fee"><?php echo $res['doc_fee']; ?></td>
                                </tr>
                                </div>
                            <?php
                            }
							?>
							</tbody>
							<tfoot>
                            <tr>
                                <td scope="col "></th>
                                <td scope="col "></th>
                                <td scope="col "></th>
								<td scope="col "></th>
                                <td class="text-right" scope="col "><b>Total:</b></th>
                                <th scope="col "></th>
                                
                            </tr>
                        </tfoot>
						</table>


					<div class="row invoice-payment	 ">
								<div class="col-6 ">
								</div>
								<div class="col-6 ">
									<div class="m-b-20 ">
										<!-- <h6>Total:</h6> -->
										
									</div>
								</div>
							</div>
							<div class="invoice-info ">
								<h5 class=" mb-0 text-right"><b>Thankyou for your kind support. </b>
								<!-- <span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus.</span></h5> -->
							</div>
					</div>
				</div>
							
			<!-- </div> -->
			<!-- /Page Wrapper -->
			
        <!-- </div> -->
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js "></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js "></script>
        <script src="assets/js/bootstrap.min.js "></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js "></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js "></script>
		<script  src="assets/js/script.js "></script>


	<!-- Calculate total -->
	<script>
			$(document).ready(function() {
				$('table thead th').each(function(i) {
					calculateColumn(i);
				});
			});

			function calculateColumn(index) {
				var total = 0;
				$('table tr').each(function() {
					var value = parseInt($('th', this).eq(index).text());
					if (!isNaN(value)) {
						total += value;
					}
				});
				$('table tfoot th').eq(index).text(total);
			}
	</script>
	</body>

</html>