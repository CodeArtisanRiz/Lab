<?php 
   include 'assets/conn/conn.php';
   if(!$con){
    die(' Please Check Your Connection'.mysqli_error($con));
}
session_start();
if(isset($_SESSION['User'])){
    $uname=$_SESSION['User']; 
    $query="select * from users where UName='$uname' ";
    $sql = mysqli_query($con,$query); 
    if(mysqli_num_rows($sql)>0){
      while($row=mysqli_fetch_assoc($sql)){
        $userName=$row['UName'];
      }
    }
  }
  else {
      header("location:login.php");
  }
   include 'assets/process/patientUpdate.php'
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
                    <div class="col-sm-12 col">
                        <a href="patient-new.php" class="btn btn-primary float-right mt-2">Add</a>
                    </div>

<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="page-title">Patient List</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
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
                        <div class="col-sm-3">
                        <!-- Filter -->
                        <input type="month" id="date-input" class="form-control" required>
                        </div>
                        <div class="col-sm-1">
                        <button id="submit" class="btn float-right" onclick="putVal()">Submit</button>
                        </div>
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
                                <th scope="col ">Total Amount</th>
                                
                                <th scope="col ">Discount</th>
                                <th scope="col ">Net Amount</th>
                                <!-- <th scope="col ">Net Total</th>-->
                                <th scope="col ">Advance</th> 
                                <th scope="col ">Paid Later</th>
                                <th scope="col ">Remaining amount</th>
                                <th scope="col ">Doc Fee</th>
                                <th scope="col ">Payment Status</th>
                                <th scope="col ">Modify</th>
                                <th scope="col ">Finalize</th>
                                <th scope="col ">Invoice</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            $query = " SELECT * from patients ORDER BY pid DESC";
                            // $query = " SELECT * from patients WHERE mobile LIKE '%{$name1}%'";
                            $result = mysqli_query($con,$query);

                            // $nums = mysqli_num_rows($result);

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
                                    <td>Dr. <?php echo $res['referredBy']; ?></td>
                                    <td><?php echo $res['total']; ?></td>
                                    <td><?php echo $res['discount']; ?></td>
                                    <td><?php echo $res['netTotal']; ?></td>
                                    <td><?php echo $res['advance']; ?></td>
                                    <td><?php echo $res['paid_later']; ?></td>
                                    <td><?php echo $res['remainingAmt']; ?></td>
                                    <td><?php echo $res['doc_fee']; ?></td>
                                    <td><?php echo $res['payment_status']; ?></td>

<!-- Modify Patient -->
                                    <td><a onclick="putVal(
                                    '<?php echo $res['pid']; ?>' , '<?php echo $res['total']; ?>' , '<?php echo $res['remainingAmt']; ?>' , '<?php echo $res['discount']; ?>' , '<?php echo $res['netTotal']; ?>')"
                                    href="#update" data-toggle="modal" class="fa fa-edit"></a></td>
<!-- Finalize Patient -->
                                    <td><a onclick="" href="assets/process/patientFinalize.php?id=<?php echo $res['pid']; ?> "><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
<!-- Patient Invoice -->
                                    <td><a id="invoice-btn" href="patient-invoice-print.php?id=<?php echo $res['pid']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
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
                            <button type="submit" name="updatePatient" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Update</button>
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
		<!-- <script  src="assets/js/script.js"></script> -->
		<script>
			$("#sidebar-menu").load("./assets/process/sidebar.html");
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

        <!-- Filter -->

        <script type="text/javascript">
            var day, month, year;
            $('#submit').on('click', function(){
            var date = new Date($('#date-input').val());
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month > 10){
                var date = ([year, month].join('-'));
            } else {
                var date = ([year, month].join('-0'));
                    }
                $("#myTable .list").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1);
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

            //  <script>
                // alert(<?php echo $postId; ?>);
            //  </script>


    </body>
</html>