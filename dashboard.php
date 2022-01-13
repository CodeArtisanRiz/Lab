<?php 
include './assets/conn/conn.php';
if(!$con){
    die(' Please Check Your Connection'.mysqli_error($con));
}
session_start();
    
// Login Check
    if(isset($_SESSION['User'])){
      $uname=$_SESSION['User']; 
      $query="select * from users where UName='$uname' ";
      $sql = mysqli_query($con,$query); 
      if(mysqli_num_rows($sql)>0){
        while($row=mysqli_fetch_assoc($sql)){
          $userName=$row['UName'];
          $userFirstName=$row['FirstName'];
        }
      }
    }
    else {
        header("location:login.php");
    }

//  Get Data
   $docQuery = "SELECT * FROM doctor";
   $testQuery = "SELECT * FROM tests";
   $patientQuery = "SELECT * FROM patients WHERE MONTH(finalizeDate) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
   $expenseQuery = "SELECT * FROM expense WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";

//    $discountQuery = "SELECT discount FROM patients";

   $clearPatientQuery = " SELECT * from patients WHERE payment_status = 'clear' AND MONTH(finalizeDate) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
   $unclearPatientQuery = " SELECT * from patients WHERE payment_status = 'not clear' AND MONTH(finalizeDate) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
   $totalDiscountCount = mysqli_query($con, $patientQuery);
   $totalRemainingCount = mysqli_query($con, $patientQuery);
   $totalExpenseCount = mysqli_query($con, $expenseQuery);


//    Count no of doctors in doctor table
    $docCount = mysqli_query($con, $docQuery);
    if ($docCount) {
        $row = mysqli_num_rows($docCount);
            if ($row != 0) {
                $docs = $row;
              }
              else {
                  $docs = 0;
              }
    }
//    Count no of tests in tests table
    $testCount = mysqli_query($con, $testQuery);
    if ($testCount) {
        $row = mysqli_num_rows($testCount);
            if ($row !=0) {
                $tests = $row;
              } else {
                  $tests = 0;
              }
    }
//    Count no of clear patients in patient table
    $clearPatientCount = mysqli_query($con, $clearPatientQuery);
    if ($clearPatientCount) {
        $row = mysqli_num_rows($clearPatientCount);
            if ($row != 0) {
                $clearPatients = $row;
              } else {
                $clearPatients = 0;
              }
    }

//    Count no of unclear patients in patient table
    $unclearPatientCount = mysqli_query($con, $unclearPatientQuery);
    if ($unclearPatientCount) {
        $row = mysqli_num_rows($unclearPatientCount);
            if ($row != 0) {
                $unclearPatients = $row;
              } else {
                $unclearPatients = 0;
              }
    }
//    Calculate total sp in patient table
    $totalCount = mysqli_query($con, $patientQuery);
        $totalRevenue = 0;
        while ($num = mysqli_fetch_assoc ($totalCount)){
            $totalRevenue += $num['total'];
        }

        //    Calculate total discount in patient table
    
        $totalDiscount = 0;
        while ($num = mysqli_fetch_assoc ($totalDiscountCount)){
            $totalDiscount += $num['discount'];
        }

        $totalExpenseAmount = 0;
        while ($num = mysqli_fetch_assoc ($totalExpenseCount)){
            $totalExpenseAmount += $num['e_amount'];
        }

        $totalRemainingAmount = 0;
        while ($num = mysqli_fetch_assoc ($totalRemainingCount)){
            $totalRemainingAmount += $num['remainingAmt'];
        }


    $netSales = $totalRevenue - $totalDiscount;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Dashboard</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
                <a href="Dashboard.html" class="logo">
                    <!-- <img src="assets/img/logo.png" alt="Logo"> -->
                </a>
                <a href="Dashboard.html" class="logo logo-small">
                    <!-- <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->

                </a>
            </div>
            <!-- /Logo -->



            <!-- <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->

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

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome <?php echo $userFirstName; ?></h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <a href="doc.php">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon text-primary border-primary">
                                                <i class="fe fe-users"></i>
                                            </span>
                                        <div class="dash-count">
                                            <h4><?php echo $docs; ?></h4>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6 class="text-muted">Doctors</h6>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary w-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <a href="tests.php">
                                <div class="card-body">
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon text-danger border-danger">
                                                <i class="fe fe-money"></i>
                                            </span>
                                        <div class="dash-count">
                                            <h4><?php echo $tests; ?></h4>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">

                                        <h6 class="text-muted">Tests</h6>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger w-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <a href="patient-list.php">
                                <div class="card-body" >
                                    <div class="dash-widget-header">
                                        <span class="dash-widget-icon text-success">
                                                <i class="fe fe-credit-card"></i>
                                            </span>
                                        <div class="dash-count">
                                        <!-- change h6 to h1 -->
                                        <h5>Clear: <?php echo $clearPatients; ?></h5>
                                        <h5>Unclear: <?php echo $unclearPatients; ?></h5>
                                        <!-- <h4>Total: <?php echo $clearPatients + $unclearPatients; ?></h4> -->
                                            <!-- <h6>add patients table uncomment the pcount fn then echo no of pat..</h6> -->
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">

                                        <h6 class="text-muted">Patients</h6>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success w-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                                    <div class="dash-count">
                                        <h4>₹<?php echo $totalRevenue; ?></h4>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Total</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                                    <div class="dash-count">
                                        <h4>₹<?php echo $totalDiscount; ?></h4>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Rebate</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                                    <div class="dash-count">
                                        <h4>₹<?php echo $netSales; ?></h4>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Net Sales</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                                    <div class="dash-count">
                                        <h4>₹<?php echo $totalRemainingAmount; ?></h4>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Pending Amount</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                                    <div class="dash-count">
                                        <h4>₹<?php echo $totalExpenseAmount; ?></h4>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Expense</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <!-- Sales Chart -->
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="card-title">Total</h4>
                            </div>
                            <div class="card-body">
                                <!-- <div id="morrisArea"></div> -->
                            </div>
                        </div>
                        <!-- /Sales Chart -->

                    </div>
                    <div class="col-md-12 col-lg-6">

                        <!-- Invoice Chart -->
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="card-title">Status</h4>
                            </div>
                            <div class="card-body">
                                <!-- <div id="morrisLine"></div> -->
                            </div>
                        </div>
                        <!-- /Invoice Chart -->

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

    <!-- SlimScroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/js/chart.morris.js"></script>
    <script>
        $("#sidebar-menu").load("./assets/process/sidebar.html");
    </script>

</body>

</html>