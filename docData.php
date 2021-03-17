<?php 
   include 'assets/conn/conn.php';
   include 'assets/process/patientUpdate.php';

    $docName= ($_GET['doc']);
    // $abc= ($_GET['ex']);

    $docFeeQuery = " SELECT SUM(doc_fee) AS value_sum from patients WHERE referredBy = '$docName' AND payment_status = 'clear' ORDER BY pid DESC";
    $resultDocFee = mysqli_query($con,$docFeeQuery);

    // $nums = mysqli_num_rows($resultDocFee);

    while($res = mysqli_fetch_assoc($resultDocFee)){
        $totalDocFee = $res['value_sum'];
    }
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
                        <button id="submit" class="btn float-right" onclick="putVal()">Submit</button>
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
                                    <li class="breadcrumb-item"><a href="doc.php">Doctors</a></li>
                                    <li class="breadcrumb-item"><?php echo $docName;?></a></li>
									<!-- <li class="breadcrumb-item active">Patient List</li> -->
								</ul>
                                </div>
						</div>

					</div>

<!-- /Page Header -->
<div class="col-sm-3 float-right">
    

    <form action="" method="Post">
    <input type="text" name="monthVal" id="monthVal" required hidden>
    <input type="text" name="yearVal" id="yearVal" required hidden>
    <button type submit name="submit" onclick="printPopup()" class="btn float-right">Print</button>
    <!-- <button type submit name="submit" class="btn float-right" onclick="print()">Print</button> -->
    </form>



    
</div>
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
                        <table class="table" id="myTable">
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
                        <!-- <tfoot>
                            <tr>
                                <td scope="col "></th>
                                <td scope="col "></th>
                                <td scope="col "></th>
                                <td scope="col "></th>
                                <td scope="col "></th>
                                <td scope="col "></th>
                                <td  scope="col "></th>
                                <td scope="col "></th> 
                                <th scope="col ">Doc Fee</th> 
                            </tr>
                        </tfoot> -->

                        <?php

                            $query = " SELECT * from patients WHERE referredBy = '$docName' AND payment_status = 'clear' ORDER BY pid DESC";
                            $result = mysqli_query($con,$query);

                            // $nums = mysqli_num_rows($result);

                            while($res = mysqli_fetch_assoc($result)){
                            ?>
                            <div id="filter">
                                <tr class="list">
                                    <td scope="row ">#PAT<?php echo $res['pid']; ?></th>
                                    <td><?php echo $res['date']; ?></td>
                                    <td><?php echo $res['pname']; ?></td>
                                    <td><?php echo $res['age']; ?></td>
                                    <td><?php echo $res['sex']; ?></td>
                                    <td><?php echo $res['tName']; ?></td>
                                    <td><?php echo $res['finalize_date']; ?></td>
                                    <td><?php echo $res['total']; ?></td>
                                    <th class="fee"><?php echo $res['doc_fee']; ?></td>
                                </tr>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- <input type="text" id="DocFeeTotal" value="docFee"> -->
                    <!-- <span id="val"></span> -->

                    
                            <!-- <input type="text" value="<?php echo $totalDocFee; ?>"> -->
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

<!-- Filter -->

        <script type="text/javascript">
            var day, month, year;
            $('#submit').on('click', function(){
            var date = new Date($('#date-input').val());
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month > 10){
                var date = ([year, month].join('/'));
            } else {
                var date = ([year, month].join('/0'));
                    }
                $("#myTable .list").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1);
                    // calculateColumn(i);
                    $("#monthVal").val(month);
                    $("#yearVal").val(year);
                });
            });
        </script>


    <!-- <script>
        function printPopup(){
            alert("Select Month & Year first.");
        }
    </script> -->

    </body>
</html>




<?php
// error_reporting(0);

    if(isset($_POST['submit'])){

        $month=$_POST['monthVal'];
        $year=$_POST['yearVal'];
            ?>
                <script>
                    window.location.replace("doc-invoice-print.php?did=<?php echo $docName; ?> &year=<?php echo $year; ?>  &month=<?php echo $month; ?>");
                </script>
            <?php
    }

?>
