<!-- Page Wrapper -->
<!-- <div class="page-wrapper"> -->
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
                                <th scope="col ">ID</th>
                                <th scope="col ">Name</th>
                                <th scope="col ">Qualification</th>
                                <th scope="col ">Specialization</th>
                                <th scope="col ">Mobile</th>
                                <th scope="col ">Referral %</th>
                                <th scope="col ">Edit</th>
                                <th scope="col ">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

<!-- PHP Query for fetching Doctor's data from database and displaying in the <table> format. -->
                        <?php
                            $selectquery = "SELECT * FROM doctor ";

                            $query = mysqli_query($con,$selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row ">DOC<?php echo $res['did']; ?></th>
                                    <td>Dr. <?php echo $res['dname']; ?></td>
                                    <td><?php echo $res['quali']; ?></td>
                                    <td><?php echo $res['special']; ?></td>
                                    <td><?php echo $res['mobile']; ?></td>
                                    <td><?php echo $res['refcent']; ?> %</td>
<!--HyperLink for Editing/Updating data in database, by passing every data in a variable. -->
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
        <!-- </div> -->
        <!-- /Page Wrapper -->