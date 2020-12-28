<?php 
   include 'assets/conn/conn.php';  // This file setsup connection from database.
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Lab Patient List</title>
		
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
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				<!-- <div class="top-nav-search">
					<form>
						<input id="myInput" type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div> -->
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-6">
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
                        <div class="col-sm-3">
                            <input id="myInput" type="text" class="form-control" placeholder="Search here">
                        </div>
						<div class="col-sm-12" id="patientList">
                        <table class="table " id="myTable">
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
                                <th scope="col ">Modify</th>
                                <th scope="col ">Invoice</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $query = " SELECT * from patients ORDER BY pid DESC";
                            // $query = " SELECT * from patients WHERE mobile LIKE '%{$name1}%'";
                            $result = mysqli_query($con,$query);

                            $nums = mysqli_num_rows($result);

                            while($res = mysqli_fetch_assoc($result)){
                            ?>
                            <div id="filter">
                                <tr class="list">
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
                                    <td><a href="#update" data-toggle="modal" class="fa fa-edit"></a></td>


                                    <td><a id="invoice-btn" href="assets/process/patientUpdate.php?id=<?php
                                     echo $res['pid']
                                     ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                    <!-- <a href="#clear" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a> -->

                                    <td><a id="invoice-btn" href="patient-invoice.php?id=<?php
                                     echo $res['pid']
                                     ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                   
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
							<h5 class="modal-title">Add Doctor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="assets/process/DocAdd.php" method="POST">

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="modalPatientId" class="form-control" name="dname" placeholder="Doctor Name">
                                <label for="modalPatientId">Patient Id</label>
                                <div class="validate"></div>
                            </div>
                        </div>


                        <!-- <div class="col-12">
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
                        </div> -->

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

            <!-- end of clear Modal -->
		
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

        <!-- <script>
        function abc(){
            var p_id = "<?php echo $res['pid']; ?>";
            // document.getElementById('modalPatientId').val = p_id;
            p_id = document.getElementById("modalPatientId").value;
        }
        </script> -->
        

    </body>
</html>