<?php 
    include '../../assets/conn/conn.php';

    $tids = $_GET['ids'];
    $tcode = $_GET['tc'];
    $tname = $_GET['tn'];
    $vial = $_GET['vt'];
    $cp = $_GET['cp'];
    $sp = $_GET['sp'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Test Update</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="../../assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="../../assets/plugins/datatables/datatables.min.css">

    <!-- Select2 Plugin -->
    <link rel="stylesheet" href="../../assets/css/select2.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style2.css">


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


            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li>
                            <a href="../../Dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="active">
                            <a href="../../doc.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="../../patients.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="../../tests.php"><i class="fe fe-user"></i> <span>Tests</span></a>
                        </li>
                        <!-- <li>
                            <a href="appointment-list.html"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                        </li>


                        <li>
                            <a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                        </li> -->
                        <li>
                            <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                        </li>
                        <!-- <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="invoice-report.html">Invoice Reports</a></li>
                            </ul>
                        </li> -->

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
                        
                            <h3 class="page-title">Edit / Update Tests</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <!-- <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li> -->
                                <li class="breadcrumb-item active">Tests</li>
                                <li class="breadcrumb-item active">Edit/Update</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">


                <form action="" method="POST">
                <div class="col-12">
                    <div class="form-label-group">
                        <input type="text" id="id_t_id" class="form-control" name="tid" value="TEST<?php echo "$tids"; ?>" disabled placeholder="Test code" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                        <label for="t_code">Test ID</label>
                        <div class="validate"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-label-group">
                        <input type="text" id="id_t_code" class="form-control" name="tcode" value="<?php echo "$tcode"; ?>" placeholder="Test code" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                        <label for="t_code">Test code</label>
                        <div class="validate"></div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-label-group">
                        <input class="form-control" name="tname" id="t_name" type="text" value="<?php echo "$tname"; ?>" placeholder="Test name*" required="required" oninvalid="this.setCustomValidity('Enter Qualification')" oninput="setCustomValidity('')" id="name">
                        <label for="t_name">Test name</label>
                        <div class="validate"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <div class="select-menu">
                            <!-- <label for="id_vial">Vial</label> -->
                            <select name="vial" id="id_vial" value="<?php echo "$vial"; ?>" class="custom-select">

                                <option value="<?php echo "$vial"; ?>" selected><?php echo "$vial"; ?></option>

                                <option value="" disabled>Select Vial Type</option>
                                <option value="Yellow Vial">Yellow Vial</option>
                                <option value="Red Vial">Red Vial</option>
                                <option value="Purple Vial (EDTA)">Purple Vial (EDTA)</option>
                                <option value="Grey Vial">Grey Vial</option>
                                <option value="Black Vial">Black Vial</option>
                                <option value="Blue Vial">Blue Vial</option>
                                <option value="Urine Container">Urine Container</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-label-group">
                        <input class="form-control" name="tcp" id="t_cp" value="<?php echo "$cp"; ?>" type="number" placeholder="Phone*" required="required" oninvalid="this.setCustomValidity('Enter CP')" oninput="setCustomValidity('')">
                        <label for="t_cp">Cost</label>
                        <div class="validate"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-label-group">
                        <input class="form-control" name="trate" id="t_rate" value="<?php echo "$sp"; ?>" type="number" placeholder="Rate*" required="required" oninvalid="this.setCustomValidity('Enter Rate')" oninput="setCustomValidity('')">
                        <label for="t_rate">Rate</label>
                        <div class="validate"></div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit " id="id_addBtn" name= "update" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Update</button>
                    <div class="validate "></div>
                </div>
                </form>



                            </div>
                        </div>
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
    <!-- <script src="assets/js/popper.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- DataTables JS -->
    <!-- <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script> -->

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>