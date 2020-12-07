<?php 
   include 'assets/conn/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Doctor List</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <!-- Select2 Plugin -->
    <link rel="stylesheet" href="assets/css/select2.min.css" />

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
                            <a href="Dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="active">
                            <a href="doc.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="patients.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="tests.php"><i class="fe fe-user"></i> <span>Tests</span></a>
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
            <div class="col-sm-12 col">
			    <a href="#Add_Doctors" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
			</div>
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">List of Doctors</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <!-- <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li> -->
                                <li class="breadcrumb-item active">Doctors</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col ">Sl</th>
                                <th scope="col ">Name</th>
                                <th scope="col ">Qualification</th>
                                <th scope="col ">Specialization</th>
                                <th scope="col ">Mobile</th>
                                <th scope="col ">Referral Percentage</th>
                                <th scope="col " colspan="2">Operations</th>

                            </tr>
                        </thead>
                        <tbody>

<!-- PHP Query for fetching Doctor's data from database and displaying in the <table> format. -->
                        <?php
                            $selectquery = " select * from doctor ";

                            $query = mysqli_query($con,$selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row "><?php echo $res['did']; ?></th>
                                    <td><?php echo $res['dname']; ?></td>
                                    <td><?php echo $res['quali']; ?></td>
                                    <td><?php echo $res['special']; ?></td>
                                    <td><?php echo $res['mobile']; ?></td>
                                    <td><?php echo $res['refcent']; ?></td>
                                    <!--HyperLink for Edditing/Updating data in database, by passing every data in a variable. -->
                                    <td><a href="assets/process/docUpdate.php?ids=<?php echo $res['did']?>&dn=<?php echo $res['dname']?>&qu=<?php echo $res['quali']?>&sp=<?php echo $res['special']?>&mb=<?php echo $res['mobile']?>&rc=<?php echo $res['refcent'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                    <!--HyperLink for Deleting data in database through Doctor's ID (did). -->
                                    <td><a href="assets/process/docDel.php?ids=<?php echo $res['did']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- Add Modal -->
			<div class="modal fade" id="Add_Doctors" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Doctor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="assets/process/DocAdd.php" method="POST">

<!-- A Div for adding new Doctor Records into Database. -->
                        <!-- <h3 class="display-7">Add Doctor</h3> -->

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="id_name" class="form-control" name="dname" placeholder="Doctor Name" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                <label for="id_name">Doctor Name</label>
                                <div class="validate"></div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="qualification" id="id_qualification" type="text" placeholder="Qualification*" required="required" oninvalid="this.setCustomValidity('Enter Qualification')" oninput="setCustomValidity('')" id="name">
                                <label for="id_qualification">Qualification</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="specialization" id="id_specialization" type="text" placeholder="Specialization*" required="required" oninvalid="this.setCustomValidity('Enter Qualification')" oninput="setCustomValidity('')" id="name">
                                <label for="id_specialization">Specialization</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="phone" id="id_phone" type="number" placeholder="Phone*" min="999999999 " required="required" oninvalid="this.setCustomValidity('Enter Phone')" oninput="setCustomValidity('')" onkeypress="if(this.value.length==10) return false;">
                                <label for="id_phone">Phone</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="refcent" id="id_referral" type="number" step="any" placeholder="Referral %*" required="required" oninvalid="this.setCustomValidity('Enter Referral %')" oninput="setCustomValidity('')">
                                <label for="id_referral">Referral %</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <!-- <div class="col-12"> -->
                            <!-- <button type="submit" name="submit" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Add</button> -->
                            <!-- <div class="validate "></div> -->
                        <!-- </div> -->
                        <div class="col-12">
                            <button type="submit" name="submit" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Add</button>
                            <div class="validate "></div>
                        </div>
                    </form>
						</div>
					</div>
				</div>
			</div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>