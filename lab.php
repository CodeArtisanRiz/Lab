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
						<ul>
        <li>
			<!-- <a href="Dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a> -->
			<a href="" id="dashboard"><i class="fe fe-home"></i> <span>Dashboard</span></a>
        </li>
        <li>
            <a href="doc.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
        </li>
        <li class="submenu">
            <a href="#"><i class="fe fe-user"></i> <span> Patients</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
                <li><a href="patient-new.php"><i class="fe fe-user-plus"></i> New Patient</a></li>
                <li><a href="patient-list.php"><i class="fe fe-user-plus"></i> All Patients</a></li>
            </ul>
        </li>
        <li>
            <a href="tests.php"><i class="fe fe-user"></i> <span>Tests</span></a>
        </li>
        <li class="submenu">
            <a href="#"><i class="fe fe-user"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
                <li><a href="report-patient.php"><i class="fe fe-user-plus"></i> Patients</a></li>
                <li><a href="report-doctor.php"><i class="fe fe-user-plus"></i> Doctors</a></li>
            </ul>
        </li>
        <li>
            <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
        </li>
        <li>
            <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
        </li>

    </ul>
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
								<h3 class="page-title">Blank Page</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Blank Page</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							Contents here
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
		<script  src="assets/js/links.js"></script>
		<script  src="assets/js/script.js"></script>
		<script>
			$("#sidebar-menu").load("sidebar.html");
			$("dashboard").click(function(){
				
			})
		</script>
    </body>
</html>