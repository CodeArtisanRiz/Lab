<?php 
   include 'assets/conn/conn.php';  // This file setsup connection from database.
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Blank Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/style2.css">
		
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
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<!-- Sidebar goes here -->
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Patient List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Patient List</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12" id="patientList">
						<table class="table ">
                        <thead>
                            <tr>
                                <th scope="col ">Patient Id</th>
                                <th scope="col ">Date</th>
                                <!-- <th scope="col ">Time</th> -->
                                <th scope="col ">Name</th>
                                <th scope="col ">Age</th>
                                <th scope="col ">Sex</th>
                                <th scope="col ">Address</th>
                                <th scope="col ">Mobile</th>
                                <th scope="col ">Referred by</th>
                                <th scope="col ">Total</th>
                                <!-- <th scope="col ">Discount</th>
                                <th scope="col ">Net Total</th>
                                <th scope="col ">Advance</th> -->
                                <th scope="col ">Remaining amount</th>
                                <th scope="col ">Edit</th>
                                <th scope="col ">Delete</th>

                            </tr>
                        </thead>
                        <tbody>

<!-- PHP Query for fetching Patients's data from database and displaying in the <table> format. -->
                        <?php
                            $selectquery = " SELECT * from patients ORDER BY pid DESC";

                            $query = mysqli_query($con,$selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row ">#PAT<?php echo $res['pid']; ?></th>
                                    <td><?php echo $res['date']; ?></td>
                                    <!-- <td><?php echo $res['time']; ?></td> -->
                                    <td><?php echo $res['pname']; ?></td>
                                    <td><?php echo $res['age']; ?></td>
                                    <td><?php echo $res['sex']; ?></td>
                                    <td><?php echo $res['paddress']; ?></td>
                                    <td><?php echo $res['mobile']; ?></td>
                                    <td><?php echo $res['referredBy']; ?></td>
                                    <td><?php echo $res['total']; ?></td>
                                    
                                    <td><?php echo $res['remainingAmt']; ?></td>

                                    <!-- HyperLink for Editing/Updating data in database, by passing every data in a variable. -->
                                    <td><a href="invoice.php?id=<?php
                                     echo $res['pid']
                                     ?>&date=<?php
                                     echo $res['date']
                                     ?>&time=<?php
                                     echo $res['time']
                                     ?>&patientAddress=<?php
                                     echo $res['paddress']
                                     ?>&name=<?php
                                     echo $res['pname']
                                     ?>&mobile=<?php
                                     echo $res['mobile']
                                     ?>&age=<?php
                                     echo $res['age']
                                     ?>&sex=<?php
                                     echo $res['sex']
                                     ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                   
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		<script>
			$("#sidebar-menu").load("sidebar.html");
			// $("#patientList").load("temp/patientList.php");
		</script>
    </body>
</html>