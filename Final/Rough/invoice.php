<?php
include 'assets/conn/conn.php';


// $dn = $_GET[''];

$patient_id = $_GET['id'];

$date = $_GET['date'];
$time = $_GET['time'];
$patientName = $_GET['name'];
$patientAddress = $_GET['patientAddress'];
$patientPhone = $_GET['mobile'];
$tName = $_GET['tests'];
// $testCode = $_GET[''];
$total = $_GET['sex'];
$discount = $_GET['discount'];
$advance = $_GET['advance'];
$netTotal = $_GET['nTotal'];
$labName ="Apollo Diagnostics";
$labAddress = "Sbg Point";
$labPhone = "9999999999";
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

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>
            <!-- Logo -->
            <div class="header-left">
                <a href="index.html" class="logo">
                    <!-- <img src="assets/img/logo.png" alt="Logo"> -->
                </a>
                <a href="index.html" class="logo logo-small">
                    <!-- <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->
                </a>
            </div>
            <!-- /Logo -->





            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">

                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Invoice Container -->
                <div class="invoice-container">

                    <div class="row">
                        <div class="col-sm-6 m-b-20">
                            <!-- <img alt="Logo" class="inv-logo img-fluid" src="assets/img/logo.png"> -->
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
								</div>
							</div>
						</div>
						<div class="row ">
							<div class="col-sm-12 m-b-20 ">
								<!-- <ul class="list-unstyled mb-0 ">
									<li>Doccure Hospital</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
									<li>GST No:</li>
								</ul> -->
							</div>
						</div>
						<div class="row ">
							<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20 ">
								<ul class="list-unstyled mb-0 ">
									<li><strong><?php echo $labName; ?></strong></li>
									<li><?php echo $labAddress; ?></li>
									<li><?php echo $labPhone; ?></li>
								</ul>
								<!-- <h6>Invoice to</h6>
								<ul class="list-unstyled mb-0 ">
									<li><h5 class="mb-0 "><strong>Charlene Reed</strong></h5></li>
									<li>4417 Goosetown Drive</li>
									<li>Taylorsville, NC, 28681</li>
									<li>United States</li>
									<li>8286329170</li>
									<li><a href="# ">charlenereed@example.com</a></li>
								</ul> -->
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20 ">
								<h6>Invoice to</h6>
								<ul class="list-unstyled mb-0 ">
									<li><h5 class="mb-0 "><strong><?php echo $patientName; ?></strong></h5></li>
									<li><?php echo $patientAddress; ?></li>
									<li><?php echo $patientPhone; ?></li>
								</ul>
								<!-- <h6>Payment Details</h6>
								<ul class="list-unstyled invoice-payment-details mb-0 ">
									<li><h5>Total Due: <span class="text-right ">$200</span></h5></li>
									<li>Bank name: <span>Profit Bank Europe</span></li>
									<li>Country: <span>United Kingdom</span></li>
									<li>City: <span>London E1 8BF</span></li>
									<li>Address: <span>3 Goodman Street</span></li>
									<li>IBAN: <span>KFH37784028476740</span></li>
									<li>SWIFT code: <span>BPT4E</span></li>
								</ul> -->
							</div>
						</div>
						

						<div class="row">
							<div class="col-md-2">
							<table id="table_sl" class="table ">
										<tr>
											<th>Serial</th>
										</tr>
									</table>
							</div>
							<div class="col-md-5">
							<table id="table_tests"  class="table ">
										<tr>
											<th>Investigations</th>
										</tr>
									</table>
							</div>
							<div class="col-md-3">
							<table id="table_code"  class="table ">
										<tr>
											<th>Investigation Code</th>
										</tr>
									</table>
							</div>
							<div class="col-md-2">
							<table id="table_rs"  class="table ">
										<tr>
											<th>Amount</th>
										</tr>
									</table>
							</div>
								
						</div>

						<!-- <div class="table-responsive "> -->
							<!-- <table>
								<thead>
									<tr>
										
									
										</th>
										<th>
										<th><table id="table_code"  class="table ">
										<tr>
											<th>Test Code</th>
										</tr>
									</table></th>
										</th>
										<th></th>
										
									</tr>
								</thead>
								
							</table> -->
						<!-- </div> -->

						<div>
							<div class="row invoice-payment ">
								<div class="col-sm-7 ">
								</div>
								<div class="col-sm-5 ">
									<div class="m-b-20 ">
										<h6>Total due</h6>
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
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="invoice-info ">
								<h5>Other information</h5>
								<p class="text-muted mb-0 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
							</div>
						</div>
						
					</div>
					<!-- /Invoice Container -->
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
        </div>
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
		var serial = ["B1", "B2", "B3", "B4", "B5", "B6"]
		
		
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

		var tests = ["B1", "B2", "B3", "B4", "B5", "B6"]
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


        var code = ["c1", "c2", "c3", "c4", "c5", "c6"]

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
        var rate = ["r1", "r2", "r3", "r4", "r5", "r6"]

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
	<script>
			$("#sidebar-menu ").load("sidebar.html ");
		</script>
    </body>

</html>