<?php 
   include 'assets/conn/conn.php';
   include 'assets/process/testUpdate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Test List</title>

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
						<!-- Sidebar goes here -->
					</div>
                </div>
            </div>
<!-- End of Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            <div class="col-sm-12 col">
			    <a href="#Add_Tests" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
			</div>
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">List of Tests</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tests</li>
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
                                <th scope="col ">ID</th>
                                <th scope="col ">Test code</th>
                                <th scope="col ">Test name</th>
                                <th scope="col ">Vial type</th>
                                <th scope="col ">Cost</th>
                                <th scope="col ">Rate</th>
                                <th scope="col ">Edit</th>
                                <!-- <th scope="col ">Edit in diff</th> -->
                                <th scope="col ">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            $selectquery = "SELECT * FROM tests ";

                            $query = mysqli_query($con, $selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row ">TEST<?php echo $res['tid']; ?></th>
                                    <td><?php echo $res['tcode']; ?></td>
                                    <td><?php echo $res['tname']; ?></td>
                                    <td><?php echo $res['vial_type']; ?></td>
                                    <td><?php echo $res['c_price']; ?></td>
                                    <td><?php echo $res['s_price']; ?></td>
                                <!-- Edit Entry -->
                                    <td><a onclick="putVal(
                                    '<?php echo $res['tid']; ?>' , '<?php echo $res['tcode']; ?>' , '<?php echo $res['tname'] ?>' , '<?php echo $res['vial_type']; ?>' , '<?php echo $res['c_price']; ?>' , '<?php echo $res['s_price']; ?>')" 
                                    href="#updateTest" data-toggle="modal" class="fa fa-edit"></a></td>
                                <!-- Edit in Diff -->
                                    <!-- <td><a href="assets/process/testUpdateOld.php?ids=<?php echo $res['tid']?>&tc=<?php echo $res['tcode']?>&tn=<?php echo $res['tname']?>&vt=<?php echo $res['vial_type']?>&cp=<?php echo $res['c_price']?>&sp=<?php echo $res['s_price'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td> -->
                                <!-- Delete Entry -->
                                    <td><a href="assets/process/testDel.php?ids=<?php echo $res['tid']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
			<div class="modal fade" id="Add_Tests" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Tests</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="assets/process/TestAdd.php" method="POST">


                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="id_t_code" class="form-control" name="tcode" placeholder="Test code" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                <label for="t_code">Test code</label>
                                <div class="validate"></div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="tname" id="t_name" type="text" placeholder="Test name*" required="required" oninvalid="this.setCustomValidity('Enter Qualification')" oninput="setCustomValidity('')" id="name">
                                <label for="t_name">Test name</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="">
                                    <!-- <label for="id_vial">Vial</label> -->
                                    <select name="vial" id="id_vial" class="form-control">
                                        <option value="" disabled selected="">Select Vial Type</option>
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
                                <input class="form-control" name="tcp" id="t_cp" type="number" placeholder="Cost*" required="required" oninvalid="this.setCustomValidity('Enter CP')" oninput="setCustomValidity('')">
                                <label for="t_cp">Cost</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="trate" id="t_rate" type="number" placeholder="Rate*" required="required" oninvalid="this.setCustomValidity('Enter Rate')" oninput="setCustomValidity('')">
                                <label for="t_rate">Rate</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit " id="id_addBtn" name= "submitUpdate" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Add</button>
                            <div class="validate "></div>
                        </div>
                    </form>
						</div>
					</div>
				</div>
			</div>
<!-- End of Add Modal -->

<!-- Update modal -->
            <div class="modal fade" id="updateTest" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Update Test</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="" method="POST">

                            <input type="text" hidden id="testUpdateID" name="testUpdateID">

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="testUpdateTC" name="testUpdateTC" class="form-control" placeholder="Test code" required="required">
                                <label for="t_code">Test code</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input id="testUpdateTN" class="form-control" name="testUpdateTN" type="text" placeholder="Test name*" required="required" >
                                <label for="t_name">Test name</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="">
                                    <select name="testUpdateVT" id="testUpdateVT" class="form-control">
                                        <option value="" readonly selected="">Select Vial Type</option>
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
                                <input id="testUpdateCP" class="form-control" name="testUpdateCP"  type="number" placeholder="Cost*" required="required">
                                <label for="t_cp">Cost</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input id="testUpdateRate" class="form-control" name="testUpdateRate" type="number" placeholder="Rate*" required="required">
                                <label for="t_rate">Rate</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit " id="updateTest" name= "updateTest" class="btn btn-primary btn-xl text-uppercase center" value="Send ">Update</button>
                            <div class="validate "></div>
                        </div>
                    </form>
						</div>
					</div>
				</div>
			</div>
            <!-- end update -->
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

    <script>
        function putVal(forwardedId, forwardedTC, forwardedTN, forwardedVT, forwardedCP, forwardedSP){

            document.getElementById("testUpdateID").value = forwardedId;
            document.getElementById("testUpdateTC").value = forwardedTC;
            document.getElementById("testUpdateTN").value = forwardedTN;
            document.getElementById("testUpdateVT").value = forwardedVT;
            document.getElementById("testUpdateCP").value = forwardedCP;
            document.getElementById("testUpdateRate").value = forwardedSP;

        }
    </script>
    <script>
			$("#sidebar-menu").load("sidebar.php");
			// $("#patientList").load("temp/patientList.php");
		</script>

</body>
</html>


