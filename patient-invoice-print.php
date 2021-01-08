<?php
include 'assets/conn/conn.php';

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
}
$centreQuery = "SELECT * FROM centre";
$cQuery = mysqli_query($con, $centreQuery);
while ($res = mysqli_fetch_assoc($cQuery)){
	$cid = $res['cid'];
	$labName = $res['lab_name'];
	$centreName = $res['centre_name'];
	$centreUhid = $res['centre_uhid'];
	$centreAddress = $res['centre_address'];
	$centrePhone = $res['centre_phone'];
}


$leadGenerated = "#000";
$empID = "#222";
$reportDeliveryMode ="eMail";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Invoice</title>

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
									<h3 class="text-uppercase ">Invoice - #PAT<?php echo $patient_id; ?></h3>
									<ul class="list-unstyled mb-0 ">
										<li>Date: <span><?php echo $date; ?></span></li>
									</ul>
									<ul class="list-unstyled mb-0 ">
										<li>Time: <span><?php echo $time; ?></span></li>
									</ul>
									<ul class="list-unstyled mb-0 ">
										<li>Referred by : <b>Dr. <?php echo $referralDoc; ?></b></li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="row ">
							<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20 ">
								<ul class="list-unstyled mb-0 ">
									<li><strong><?php echo $labName; ?></strong></li>
									<li><strong><?php echo $centreName; ?></strong></li>
									<li><?php echo $centreUhid; ?></li>
									<li><?php echo $centreAddress; ?></li>
									<li><?php echo $centrePhone; ?></li>
								</ul>
								
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20 ">
								<h6>Invoice to</h6>
								<ul class="list-unstyled mb-0 ">
									<li><h5 class="mb-0 "><strong><?php echo $patientName; ?></strong></h5></li>
									<li><?php echo $patientAddress; ?></li>
									<li>+<?php echo $patientPhone; ?></li>
								</ul>
								
							</div>
						</div>
						

						<div class="row">
							<div class="col-md-2">
							<table id="table_sl" class="table">
										<tr>
											<th>Serial</th>
										</tr>
									</table>
							</div>
							<div class="col-md-5">
							<table id="table_tests"  class="table">
										<tr>
											<th>Investigations</th>
										</tr>
									</table>
							</div>
							<div class="col-md-3">
							<table id="table_code"  class="table">
										<tr>
											<th>Investigation Code</th>
										</tr>
									</table>
							</div>
							<div class="col-md-2">
							<table id="table_rs"  class="table">
										<tr>
											<th>Amount</th>
										</tr>
									</table>
							</div>
								
						</div>

						

						<div>
							<div class="row invoice-payment ">
								<div class="col-sm-7 ">
								</div>
								<div class="col-sm-5 ">
									<div class="m-b-20 ">
										<!-- <h6>Total:</h6> -->
										<div class="table-responsive no-border ">
											<table class="table mb-0 ">
												<tbody>
													<tr>
														<th>Total:</th>
														<td class="text-right "><?php echo $total ?></td>
													</tr>
													<tr>
														<th>Discount: </th>
														<td class="text-right "><?php echo $discount ?></td>
													</tr>
													<tr>
														<th>Net Total:</th>
														<td class="text-right text-primary "><?php echo $netTotal ?></h5></td>
													</tr>
													<tr>
														<th>Authorized signature :</th>
														<td class="text-right "></h5></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="invoice-info ">
								<h5>Other information</h5>
								<!-- <p class="text-muted mb-0 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p> -->
							</div>
						</div>
						
					</div>
					<!-- /Invoice Container -->
					
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
		
		<script>
		var serial = [];
		var tNList = "<?php echo $testNames; ?>"
		var tests = tNList.split(",");
		var tCList = "<?php echo $testCodes; ?>"
		var code = tCList.split(",");
		var tRList = "<?php echo $testRates; ?>"
		var rate = tRList.split(",");
		var count = tests.length - 1;

		for (var l = 1; l <= count; l++ ){
			serial.push(l);
		}

        for (var i = 0; i < serial.length; i++) {
            // create a new row
            var newRow = table_sl.insertRow(table_sl.length);
            for (var j = 0; j < 1; j++) {
                // create a new cell
                var cell = newRow.insertCell(j);

                // add value to the cell
                cell.innerHTML = serial[i];
            }
        }

        for (var i = 0; i < tests.length; i++) {
            // create a new row
            var newRow = table_tests.insertRow(table_tests.length);
            for (var j = 0; j < 1; j++) {
                // create a new cell
                var cell = newRow.insertCell(j);

                // add value to the cell
                cell.innerHTML = tests[i];
            }
        }

        for (var i = 0; i < code.length; i++) {
            // create a new row
            var newRow = table_code.insertRow(table_code.length);
            for (var j = 0; j < 1; j++) {
                // create a new cell
                var cell = newRow.insertCell(j);

                // add value to the cell
                cell.innerHTML = code[i];
            }
        }

        for (var i = 0; i < code.length; i++) {
            // create a new row
            var newRow = table_rs.insertRow(table_rs.length);
            for (var j = 0; j < 1; j++) {
                // create a new cell
                var cell = newRow.insertCell(j);

                // add value to the cell
                cell.innerHTML = rate[i];
            }
        }
	</script>
	<!-- <script>
			$("#sidebar-menu ").load("sidebar.html ");
	</script> -->
    <!-- Print -->
	<script>
		
		
		window.print();
		setTimeout(function () {
			window.location.replace("patient-list.php");	
		},1);
		
	</script>
	</body>

</html>