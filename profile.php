<?php 
   include 'assets/conn/conn.php';
   include 'assets/process/profileUpdate.php'
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Lab Profile</title>

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
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>

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
                    <!-- <div class="col-sm-12 col">
                        <a href="patient-new.php" class="btn btn-primary float-right mt-2">Add</a>
                    </div> -->

<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
                                </div>
						</div>

					</div>

<!-- /Page Header -->

					<div class="row">
                        <!-- <div class="col-sm-3">
                            <input id="myInput" type="text" class="form-control" placeholder="Search here">
                        </div> -->
						<div class="col-sm-12" id="patientList">
                        <table class="table " id="myTable">
                        <thead>
                            <tr>
                                <th scope="col ">ID</th>
                                <th scope="col ">Lab Name</th>
                                <th scope="col ">Centre Name</th>
                                <th scope="col ">UHID</th>
                                <th scope="col ">GSTIN</th>
                                <th scope="col ">Address</th>
                                <th scope="col ">Phone</th>
                                <th scope="col ">Pickup Charge</th>
                                <th scope="col ">Report Delivery Charge</th>
                                <th scope="col ">Modify</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $query = " SELECT * from profile";
                            $result = mysqli_query($con,$query);

                            $nums = mysqli_num_rows($result);

                            while($res = mysqli_fetch_assoc($result)){
                            ?>
                            <div id="filter">
                                <tr class="list">
                                    <th scope="row "><?php echo $res['cid']; ?></th>
                                    <td><?php echo $res['lab_name']; ?></td>
                                    <td><?php echo $res['centre_name']; ?></td>
                                    <td><?php echo $res['centre_uhid']; ?></td>
                                    <td><?php echo $res['centre_GSTIN']; ?></td>
                                    <td><?php echo $res['centre_address']; ?></td>
                                    <td><?php echo $res['centre_phone']; ?></td>
                                    <td><?php echo $res['pickup']; ?></td>
                                    <td><?php echo $res['delivery']; ?></td>

<!-- Modify Patient -->
                                    <td><a onclick="putVal(
                                    '<?php echo $res['cid']; ?>' ,
                                    '<?php echo $res['lab_name']; ?>' ,
                                    '<?php echo $res['centre_name']; ?>' ,
                                    '<?php echo $res['centre_uhid']; ?>' ,
                                    '<?php echo $res['centre_GSTIN']; ?>' ,
                                    '<?php echo $res['centre_address']; ?>' ,
                                    '<?php echo $res['centre_phone']; ?>' ,
                                    '<?php echo $res['pickup']; ?>' ,
                                    '<?php echo $res['delivery']; ?>'
                                    
                                    )"
                                    href="#update" data-toggle="modal" class="fa fa-edit"></a></td>
                                    </tr>
                                </div>
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

<!-- Update Modal -->
			<div class="modal fade" id="update" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Update patient details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="" method="POST">
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="labId" class="form-control" name="labId" readonly>
                                <label for="labId">Id</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="labName" class="form-control" name="labName">
                                <label for="labName">Lab Name</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="centreName" class="form-control" name="centreName">
                                <label for="centreName">Centre Name</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="uhid" class="form-control" name="uhid">
                                <label for="uhid">UHID</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="gstin" class="form-control" name="gstin">
                                <label for="gstin">GSTIN</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="address" class="form-control" name="address">
                                <label for="address">Address</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="phone" class="form-control" name="phone">
                                <label for="phone">Phone</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="pickup" class="form-control" name="pickup">
                                <label for="pickup">Home Pickup Charge</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="delivery" class="form-control" name="delivery">
                                <label for="delivery">Home Delivery Charge</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        

                        <div class="col-12">
                            <button type="submit" name="updateProfile" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Update</button>
                            <div class="validate "></div>
                        </div>
                    </form>
						</div>
					</div>
				</div>
			</div>

<!-- End of Update Modal -->


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

<!-- Search -->
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable .list").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script> 

            <script>
                function putVal(labId, labName, centreName, uhid, gstin, address, phone, pickup, delivery){

                    document.getElementById("labId").value = labId;
                    document.getElementById("labName").value = labName;
                    document.getElementById("centreName").value = centreName;
                    document.getElementById("uhid").value = uhid;
                    document.getElementById("gstin").value = gstin;
                    document.getElementById("address").value = address;
                    document.getElementById("phone").value = phone;
                    document.getElementById("pickup").value = pickup;
                    document.getElementById("delivery").value = delivery;
                    }
             </script>

             <script>
                alert(<?php echo $postId; ?>)
             </script>

             <script>
			    $("#sidebar-menu").load("sidebar.html");
		    </script>

    </body>
</html>