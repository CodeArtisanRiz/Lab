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
                                <th scope="col ">Finalize</th>
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
                                    <td><a onclick="putVal(
                                    <?php echo $res['pid']; ?>,<?php echo $res['total']; ?> ,<?php echo $res['remainingAmt']; ?> ,<?php echo $res['discount']; ?>, <?php echo $res['netTotal']; ?> 
                                    )" href="#update" data-toggle="modal" class="fa fa-edit"></a></td>
                                    <!-- this.value, this.id -->
                                    <td>
                                    <a onclick="" href="assets/process/patientFinalize.php?id=<?php echo $res['pid'];
                                    ?> "><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>

                                    <td><a id="invoice-btn" href="patient-invoice.php?id=<?php
                                     echo $res['pid'];
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


            <!-- Passing id of selected column to update model -->
            <!-- <script src="assets/js/passData.js"></script> -->
            <script>
             function putVal(postId, postTotal, postRA, discount, nTotal){

                document.getElementById("mPatientId").value = postId;
                document.getElementById("mPatientTotal").value = postTotal;
                document.getElementById("mPatientRA").value = postRA;
                document.getElementById("mPatientAD").value = "0";
                document.getElementById("mPatientPA").value = postRA;
                document.getElementById("hiddenInputD").value = discount;
                document.getElementById("hiddenInputNT").value = nTotal;
                // calcAD();
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
    </body>
</html>


<?php
    
    if(isset($_POST['updatePatient'])){
      
        $submitId=($_POST['mPatientId']);
        echo $postId;
        $submitTotal=trim($_POST['mPatientTotal']);                       //trim is used to omitt white space at first and last
        $RA=trim($_POST['mPatientRA']);
        $submitAD=trim($_POST['mPatientAD']);
        $submitPA=trim($_POST['mPatientPA']);
        $submitRA= "0";
        $discount = trim($_POST['hiddenInputD']);
        $totalDiscount = $submitAD + $discount;
        $netTotal = trim($_POST['hiddenInputNT']);
        $submitNT = $netTotal - $submitAD;

        // if(empty($submitId) || empty($submitTotal) || empty($submitTotal) || empty($submitRA) || empty($submitAD) || empty($submitPA))
        // {
        //     echo '<script>alert("Please fill up the empty fields..");</script>' ;

        // }
        // else{
            $update = " UPDATE patients SET netTotal='$submitNT', remainingAmt='$submitRA', discount='$totalDiscount', paid_later='$submitPA' WHERE pid='$submitId' ";
            $res = mysqli_query($con,$update);

            if($res){
                // echo '<script>alert("Record Updated..");</script>' ;
                ?>
                <script>
                window.location.replace("patient-list.php");
                </script>
                <?php
            }
            else{
                echo '<script>alert("Error. Record Not Updated..");</script>' ;
            }

        }
?>