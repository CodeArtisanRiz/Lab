<?php 
   include 'assets/conn/conn.php';
   include 'assets/process/patientUpdate.php';

    $docName= ($_GET['doc']);
    
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
                    
                </div>
            </div>
        </div>
<!-- End of Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    
                        <div class="col-sm-3 float-right">
                        <!-- Filter -->
                        <input type="month" id="date-input" class="form-control" required>
                        <button id="submit" class="btn float-right">Submit</button>
                        </div>
                        <div class="col-sm-3 float-right">
                        <!-- Search -->
                        <input id="myInput" type="text" class="form-control" placeholder="Search here">
                        </div>
<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="page-title">Patients under Dr. <?php  echo $docName; ?> </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Patient List</li>
								</ul>
                                </div>
						</div>

					</div>

<!-- /Page Header -->
<div class="row col-12">
    <br>
</div>
					<div class="row col-12">
                        <!-- <div class="col-sm-2">
                            <input type="date" format="mm-yyyy" id="date-input" class="form-control" required placeholder="hjhjb">
                        </div>

                        <div class="col-sm-2">
                        <button id="submit" class="btn">Submit</button>
                        </div> -->
                        <!-- <div class="col-sm-2">
                            <input type="month" id="date-input" class="form-control" required>
                        </div>

                        <div class="col-sm-2">
                        <button id="submit" class="btn">Submit</button>
                        </div>

                        <div class="col-sm-3">
                            <input id="myInput" type="text" class="form-control" placeholder="Search here">
                        </div> -->


                        <br>
						<div class="col-sm-12" id="patientList">
                        <table class="table " id="myTable">
                        <thead>
                            <tr>
                                <th scope="col ">Patient Id</th>
                                <th scope="col ">Date</th>
                                <th scope="col ">Name</th>
                                <th scope="col ">Age</th>
                                <th scope="col ">Sex</th>
                                <th scope="col ">Investigations</th>
                                <th  scope="col ">Finalized</th>
                                <th scope="col ">Amount</th> 
                                <th scope="col ">Doc Fee</th> 
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $query = " SELECT * from patients WHERE referredBy = '$docName' ";
                            $result = mysqli_query($con,$query);

                            $nums = mysqli_num_rows($result);

                            while($res = mysqli_fetch_assoc($result)){
                            ?>
                            <div id="filter">
                                <tr class="list">
                                    <th scope="row ">#PAT<?php echo $res['pid']; ?></th>
                                    <td><?php echo $res['date']; ?></td>
                                    <td><?php echo $res['pname']; ?></td>
                                    <td><?php echo $res['age']; ?></td>
                                    <td><?php echo $res['sex']; ?></td>
                                    <td><?php echo $res['tName']; ?></td>
                                    <td><?php echo $res['finalize_date']; ?></td>
                                    <!-- <td><?php echo $res['finalizeDate']; ?></td> -->
                                    <td><?php echo $res['total']; ?></td>
                                    <!-- change remainingAmt to docFee -->
                                    <td><?php echo $res['remainingAmt']; ?></td>
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
                                <input type="text" id="mPatientId" class="form-control" name="mPatientId" placeholder="Patient Id" readonly>
                                <label for="mPatientId">Patient Id</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="mPatientTotal" class="form-control" name="mPatientTotal" placeholder="Total" readonly>
                                <label for="mPatientTotal">Total</label>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="mPatientRA" class="form-control" name="mPatientRA" placeholder="Remaining Amount" readonly>
                                <label for="mPatientRA">Remaining Amount</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="mPatientAD" class="form-control" name="mPatientAD" placeholder="Additional Discount" value="0" onchange="calcAD()">
                                <label for="mPatientAD">Additional Discount</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="mPatientPA" class="form-control" name="mPatientPA" placeholder="Payable Amount" readonly>
                                <label for="mPatientPA">Payable Amount</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <input type="text" hidden id="hiddenInputD" class="form-control" name="hiddenInputD">
                        <input type="text" hidden id="hiddenInputNT" class="form-control" name="hiddenInputNT">

                        <div class="col-12">
                            <button type="submit" name="updatePatient" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Paid</button>
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
			$("#sidebar-menu").load("sidebar.php");
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
                function putVal(postId, postTotal, postRA, discount, nTotal){

                    document.getElementById("mPatientId").value = postId;
                    document.getElementById("mPatientTotal").value = postTotal;
                    document.getElementById("mPatientRA").value = postRA;
                    document.getElementById("mPatientAD").value = "0";
                    document.getElementById("mPatientPA").value = postRA;
                    document.getElementById("hiddenInputD").value = discount;
                    document.getElementById("hiddenInputNT").value = nTotal;
                    }
                function calcAD(){
                    var reAmount = document.getElementById("mPatientRA").value;
                    var aDiscount = document.getElementById("mPatientAD").value;
                    var payableAmount = reAmount - aDiscount;
                    document.getElementById("mPatientPA").value = payableAmount;
                }
             </script>

             <script>
                alert(<?php echo $postId; ?>)
             </script>

             <script>
			    $("#sidebar-menu").load("sidebar.php");
		    </script>
            <script>
                alert(<?php echo $sDocName; ?>)
            </script>

        <script type="text/javascript">
            
            var day, month, year;
            $('#submit').on('click', function(){
            var date = new Date($('#date-input').val());
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month > 10){
                var date = ([year, month].join('/'));
            }
            else {
                var date = ([year, month].join('/0'));
            }
                    $("#myTable .list").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1)
                    });

            });
        </script>

    </body>
</html>