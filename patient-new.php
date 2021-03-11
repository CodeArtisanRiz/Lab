<?php
include "assets/conn/conn.php";
$t_records = mysqli_query($con, "SELECT * From tests");
$d_records = mysqli_query($con, "SELECT * From doctor");
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>New Patient</title>
		
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
				<!-- /Logo -->

				
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
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
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">New Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="patient-list.php">Patient List</a></li>
									<li class="breadcrumb-item active">New Patient</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
						<section class="investigation">
							<form class="" method="POST"  id="formid">
								<div class="row">
									<div class="col">
										<div class="row">
											<div class="col-12">
												<!-- <div class="form-label-group">
													<input type="number" id="id_id" class="form-control" placeholder="ID" name="id">
													<label for="id_id">ID</label>
												</div> -->
											</div>
											<div class="col-12">
												<div class="form-label-group">
													<input type="text" id="id_name" class="form-control" placeholder="Name" name="name">
													<label for="id_name">Name</label>
												</div>
											</div>
											<div class="col-12">
												<div class="form-label-group">
													<input type="text" id="id_address" name="address" class="form-control" placeholder="Address">
													<label for="id_address">Address</label>
												</div>
											</div>

										</div>
									</div>
									<div class="col">
										<div class="row">
											<div class="col-12">
												<!-- <div class="form-label-group">
													<input type="date" name="date" id="id_date" class="form-control">
													<label for="id_date">Date</label>
												</div> -->
											</div>
											<div class="col-12">
												<div class="form-label-group">
													<input type="text" class="form-control" name="age" id="id_age" placeholder="Age">
													<label for="id_age">Age</label>
												</div>
											</div>
											<div class="col-12">
												<div class="form-label-group">
													<input type="tel" class="form-control" name="mobile" id="id_mobile" placeholder="Mobile">
													<label for="id_mobile">Mobile</label>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="row">
											<div class="col-12">
												<!-- <div class="form-label-group">
													<input type="time" name="time" id="id_time" class="form-control">
													<label for="id_time">Time</label>
												</div> -->
											</div>
											<!-- <div class="col-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" name="" id="collectionCharge">
													<label for="collectionCharge">Collection Charge</label>
												</div>
											</div -->
											<div class="col-6">
												<div class="form-label-group">
												<select class="form-control custom-select" id="id_col_mode" name="colMode" onchange="putVal3(this.value, this.id)">
													<option disabled selected>Collection Mode</option>
													<option>Home Collection</option>
													<option>Centre Collection</option>
												</select>
													<!-- <input type="text" name="sex" id="" placeholder="Sex" class="form-control">
													<label for="">Sex</label> -->
												</div>
											</div>
											
											<div class="col-6">
												<div class="form-label-group">
												<select class="form-control custom-select" id="id_sex" name="sex">
													<option disabled selected>Sex</option>
													<option>Male</option>
													<option>Female</option>
													<option>Other</option>
												</select>
													<!-- <input type="text" name="sex" id="" placeholder="Sex" class="form-control">
													<label for="">Sex</label> -->
												</div>
											</div>
											<div class="col-6">
												<div class="form-label-group">
												<select class="form-control custom-select" id="ref_doc" name="referredby" onchange="putVal(this.value, this.id)">
											<option disabled selected>Referred by</option>
											<?php
											while ($data = mysqli_fetch_array($d_records))
											{
												echo "<option value'". $data['dname']."'>".$data['dname']."</option>";
											}
											?>
												</select>
												</div>
											</div>
											<div class="col-6">
												<div class="form-label-group">
												<select class="form-control custom-select" id="id_del_mode" name="delMode" onchange="putValDel(this.value, this.id)">
													<option disabled selected>Delivery</option> Mode</option>
													<option>Centre Visit</option>
													<option>Email</option>
													<option>Home Delivery</option>
												</select>
													<!-- <input type="text" name="sex" id="" placeholder="Sex" class="form-control">
													<label for="">Sex</label> -->
												</div>
											</div>
										
										</div>
										

									</div>
								</div>
								</div>

								</div>
								<div class="row input-form" id="inputf">
									<div class="col-12">
										<div class="row form-type">
											<div class="col-2">
												<div class="form-label-group">
													<input type="number" name="sl" id="1" class="form-control" disabled placeholder="Serial." value="1" >
													<label for="sl">Serial</label>
												</div>
											</div>
											<div class="col-6">
												<div class="form-label-group">
												<!-- <label for="1">Test Name</label> -->
													<select class="form-control test_name custom-select" id="1"  onchange="putVal2(this.value, this.id)">
													<option disabled selected>Test Name</option>
													<?php
													while ($data = mysqli_fetch_array($t_records))
													{
														echo "<option value'". $data['tname']."'>".$data['tname']."</option>";
													}
													?>
													</select>
													
												</div>
											</div>
											<div class="col-2">
												<div class="form-label-group">
													<input type="text" name="testcode" class="form-control test_code" id="tCode1" placeholder="Test Code" readonly>
													<label for="tCode1">Test Code</label>
												</div>
											</div>

											<div class="col-2">
												<div class="form-label-group">
													<input type="tel" name="price" id="tPrice1" placeholder="Price" class="form-control price test_price" onchange="cal()" readonly>
													<label for="tPrice1">Test Rate</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-1">
									<input type='button' id='but_add' value='Add more' class="btn" onclick="addColumn()">
								</div>

								<div class="col-4">
									<div class="row">
										<div class="col-12">
											<div class="form-label-group">
												<input type="text" name="total" id="id_total" placeholder="Total" class="form-control" readonly>
												<label for="id_total">Total</label>
											</div>
										</div>
										<div class="col-12">
											<div class="form-label-group">
												<input type="text" name="discount" id="id_discount" placeholder="Discount" class="form-control" onchange="disc()"> 
												<label for="id_discount">Discount</label>
											</div>
										</div>
										<div class="col-12">
											<div class="form-label-group">
												<input type="text" name="net_total" id="id_net_total" placeholder="Net Total" class="form-control" readonly>
												<label for="id_net_total">Net Total</label>
											</div>
										</div>
										<div class="col-12">
											<div class="form-label-group">
												<input type="text" name="advance" id="id_advance" placeholder="Advance" class="form-control" onchange="rb()">
												<label for="id_advance">Advance</label>
											</div>
										</div>
										<div class="col-12">
											<div class="form-label-group">
												<input type="text" name="remaining_balance" id="id_remaining_balance" placeholder="Remaining Balance" class="form-control" readonly>
												<label for="id_remaining_balance">Remaining Amount</label>
											</div>
										</div>
									</div>



									
								</div>
								
								<!-- <a href=""><input id = "id_save"class="btn float-right my-2" name="save" value="Save" onclick="mergeTCode()"></a> -->


								<button type="submit " id="id_addBtn" name= "save" class="btn btn-primary btn-xl text-uppercase center " onclick="mergeTCode()">Submit</button>
								
								<!-- <input id= "id_save" value="Save" > -->

								<input type="text" name="tName" hidden id="tNh">
								<input type="text" name="tCode" hidden id="tCh">
								<input type="text" name="tPrice" hidden id="tPh">
								<input type="text" name="docFeePercent" hidden id="docFeePercent">
								<input type="text" name="colFee"  id="colFee">
								<input type="text" name="delFee"  id="delFee">

								
							</form>


						</section>

		
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
		</script>

		<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/js/duplicator.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


        
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/addItems.js"></script>


            <script>

// Onchange function for selecting option from Collection Mode.
			function putVal3(colMode, colId){
				// alert(colMode);
                    const ajaxreq = new XMLHttpRequest();
                    ajaxreq.open('GET','assets/process/getColFee.php?selectvalue='+colMode, 'TRUE');
                    ajaxreq.send();
                    ajaxreq.onreadystatechange = function(){
                        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                            var returnText = ajaxreq.responseText;
                            // alert (returnText);
							$("#colFee").val(returnText);
						sum();
                        disc();
                        }
                    }
                }
// Onchange function for selecting option from Delivery Mode.
			function putValDel(delMode, colId){
				// alert(colMode);
                    const ajaxreq = new XMLHttpRequest();
                    ajaxreq.open('GET','assets/process/getDelFee.php?selectvalue='+delMode, 'TRUE');
                    ajaxreq.send();
                    ajaxreq.onreadystatechange = function(){
                        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                            var returnText = ajaxreq.responseText;
                            // alert (returnText);
							$("#delFee").val(returnText);
						sum();
                        disc();
                        }
                    }
                }
// Onchange function for selecting option from Referred Doctor List.
			function putVal(docName, did){
				// alert(docName);
                    const ajaxreq = new XMLHttpRequest();
                    ajaxreq.open('GET','assets/process/getDocFee.php?selectvalue='+docName, 'TRUE');
                    ajaxreq.send();
                    ajaxreq.onreadystatechange = function(){
                        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                            var returnText = ajaxreq.responseText;
                            // alert (returnText);
							$("#docFeePercent").val(returnText);
                        }
                    }
                }
// Onchange function for selecting option from test name.
                function putVal2(data, tid){
                    const ajaxValReq = new XMLHttpRequest();
                    ajaxValReq.open('GET','assets/process/getData.php?selectvalue='+data, 'TRUE');
                    ajaxValReq.send();
                    ajaxValReq.onreadystatechange = function(){
                        if(ajaxValReq.readyState == 4 && ajaxValReq.status == 200){
                            var returnText = ajaxValReq.responseText;
                            // alert (returnText);
                            var rT = returnText.split("~"), a = rT[0], b = rT[1];  //a = tcode, b = tprice
                            $("#tCode"+tid).val(a);
                            $("#tPrice"+tid).val(b);
                        }
                        sum();
                        disc();
                    }
                }
            
            // Works for first row of adding tests.
            $("#formid").find("select").on('input', function() {
                putVal(data, tid);
            });
            // $("#calc").bind("click", function(){
                function sum() {
					var colAmount = parseFloat(document.getElementById("colFee").value);
					var delAmount = parseFloat(document.getElementById("delFee").value);
                var amount_sum = colAmount + delAmount;
                //calculate total worth of money
                $('.price').each(function(){
                //checks whether the DOM element is an input element or a div
                    if(this.tagName.toLowerCase() == "input"){
                        amount_sum += Number($(this).val());
                    }
                });
                // alert(amount_sum);
                $("#id_total").val(amount_sum);
                $("#id_net_total").val(amount_sum);
                }

                function disc(){
                    var discount = document.getElementById("id_discount").value;
                    var total = document.getElementById("id_total").value;
                    var nT = total - discount;
                    // alert (nT);
                    $("#id_net_total").val(nT);
                    rb();
                }
                function rb(){
                    var adv = document.getElementById("id_advance").value;
                    var nT = document.getElementById("id_net_total").value;
                    var rB = nT - adv;
                    // alert (nT);
                    $("#id_remaining_balance").val(rB);
					// if(rB>0){
						// alert ("Remaining Amt: " + rB);
					// }
                }

                function mergeTCode() {

                var tN = []
                $('.test_name').each(function(){
                    //console.log($(this));
                    //checks whether the DOM element is an input element or a div
                    if(this.tagName.toLowerCase() == "select"){
                        tN += $(this).val() + ", ";
                    }
                });
                console.log(tN);
                $("#tNh").val(tN);
                // alert (tN);

                var tC = []
                $('.test_code').each(function(){
                    if(this.tagName.toLowerCase() == "input"){
                        tC += $(this).val() + ", ";
                    }
                });
                console.log(tC);
                $("#tCh").val(tC);
                // alert (tC);

                var tP = []
                $('.test_price').each(function(){
                    if(this.tagName.toLowerCase() == "input"){
                        tP += $(this).val() + ", ";
                    }
                });
                console.log(tP);
                $("#tPh").val(tP);
                // alert (tN);
        }
        </script>
    </body>
</html>




<?php
error_reporting(0);

    if(isset($_POST['save'])){

        $name=$_POST['name']; 
        $address=$_POST['address'];
        $age=$_POST['age']; 
        $mobile=$_POST['mobile'];
        $sex=$_POST['sex']; 
        $referredby=$_POST['referredby'];
        $testName = $_POST['tName'];
        $testCode = $_POST['tCode'];;
        $testPrice = $_POST['tPrice'];;
        $total=$_POST['total'];
        $disc=$_POST['discount'];
        $netTotal=$_POST['net_total'];
        $advance=$_POST['advance'];
		$remainingAmt=$_POST['remaining_balance'];
		$colMode = $_POST['colMode'];
		$colFee = $_POST['colFee'];
		$delMode = $_POST['delMode'];
		$delFee = $_POST['delFee'];

		$docPercent = $_POST['docFeePercent'];
		if($remainingAmt==0){
			$paymentStatus = "clear";
			$finalizeDate = date("Y/m/d");
		}else {
			$paymentStatus = "not clear";
			$finalizeDate = "";
		}

		function getDocFee($totalAmount, $percent){
			return ($percent / 100) * $totalAmount;
		}

		$docFee = getDocFee ($total, $docPercent);


        $insertquery = "INSERT into patients (pname, age, sex, paddress, mobile, referredBy, tName, tCode, tPrice, total, discount, netTotal, advance, remainingAmt, col_mode, del_mode,finalize_date, payment_status, doc_fee, col_fee, del_fee) values('$name','$age','$sex','$address','$mobile','$referredby','$testName','$testCode','$testPrice','$total','$disc','$netTotal','$advance','$remainingAmt','$colMode','$delMode','$finalizeDate','$paymentStatus','$docFee','$colFee','$delFee')";
            if(mysqli_query($con,$insertquery)) {
				?>
                <script>
                window.location.replace("patient-list.php");
                </script>
                <?php
            }
    }

?>
