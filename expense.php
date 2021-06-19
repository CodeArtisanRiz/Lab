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
   include 'assets/process/expenseUpdate.php';
?>
<!exTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Lab - Expense</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
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

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    
                </div>
            </div>
        </div>

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            <div class="col-sm-12 col">
			    <a href="#Add_Expense" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
			</div>
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">List of Expenses</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <!-- <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li> -->
                                <li class="breadcrumb-item active">Expense</li>
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
                                <th scope="col ">Name</th>
                                <th scope="col ">Date</th>
                                <th scope="col ">Time</th>
                                <th scope="col ">Amount</th>
                                <th scope="col ">Edit</th>
                                <!-- <th scope="col ">Edit in diff</th> -->
                                <th scope="col ">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            $selectquery = "SELECT * FROM expense ";

                            $query = mysqli_query($con, $selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row ">Expense_<?php echo $res['e_id']; ?></th>
                                    <td><?php echo $res['e_name']; ?></td>
                                    <td><?php echo $res['e_date']; ?></td>
                                    <td><?php echo $res['e_time']; ?></td>
                                    <td><?php echo $res['e_amount']; ?></td>
                                    
                                <!-- Edit Entry -->
                                    <td><a onclick="putVal(
                                    '<?php echo $res['e_id']; ?>','<?php echo $res['e_name']; ?>' , '<?php echo $res['e_amount'] ?>')" 
                                    href="#updateExpense" data-toggle="modal" class="fa fa-edit"></a></td>
                                <!-- Edit in Diff -->
                                    <!-- <td><a href="assets/process/testUpdateOld.php?ids=<?php echo $res['tid']?>&tc=<?php echo $res['tcode']?>&tn=<?php echo $res['tname']?>&vt=<?php echo $res['vial_type']?>&cp=<?php echo $res['c_price']?>&sp=<?php echo $res['s_price'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td> -->
                                <!-- Delete Entry -->
                                    <td><a href="assets/process/expenseDel.php?e_id=<?php echo $res['e_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
			<div class="modal fade" id="Add_Expense" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Expense</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="assets/process/ExpenseAdd.php" method="POST">


                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="id_name" class="form-control" name="e_name" placeholder="Doctor Name" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                <label for="id_name">Name</label>
                                <div class="validate"></div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="e_amount" id="id_amount" type="text" placeholder="Amount*" required="required" oninvalid="this.setCustomValidity('Enter Amount')" oninput="setCustomValidity('')" id="name">
                                <label for="id_amount">Amount</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Add</button>
                            <div class="validate "></div>
                        </div>
                    </form>
						</div>
					</div>
				</div>
			</div>

            <!-- Update Modal -->

            <div class="modal fade" id="updateExpense" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Update Expense</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="" method="POST">

                        <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="exUpdateID" class="form-control" name="exUpdateID" placeholder="extor ID" required="required" readonly>
                                    <label for="id_did">ID</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="exUpdateName" class="form-control" name="exUpdateName" placeholder="extor Name" required="required">
                                    <label for="id_name">Name</label>
                                    <div class="validate"></div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-label-group">
                                    <input class="form-control" name="exUpdateAmount" id="exUpdateAmount" type="text" placeholder="Amount*" required="required">
                                    <label for="id_amount">Amount</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="updateExpense" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Update</button>
                                <div class="validate "></div>
                            </div>
                    </form>
						</div>
					</div>
				</div>
			</div>

            <!-- End of Update Modal -->
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
    <!-- <script src="assets/js/script.js"></script> -->
    <script>
        $("#sidebar-menu").load("./assets/process/sidebar.html");
    </script>

    <script>
        function putVal(forwardedId, forwardedDN, forwardedDQ, forwardedDS, forwardedDP, forwardedDR){

            document.getElementById("exUpdateID").value = forwardedId;
            document.getElementById("exUpdateName").value = forwardedDN;
            document.getElementById("exUpdateAmount").value = forwardedDQ;
            

        }
    </script>

</body>

</html>