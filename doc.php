<?php 
   include 'assets\conn\conn.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>


        <div class="container my-5">
            <div class="row">
                <!-- <div class="col-md-2 jumbotron index">
                    <h1 class="display-7">Index</h1>
                </div> -->

                <div class="col-md jumbotron add">
                    <form action="assets\process\DocAdd.php" method="POST">


                        <h3 class="display-7">Add Doctor</h3>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="id_name" class="form-control" name="dname" placeholder="Doctor Name" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                <label for="id_name">Doctor Name</label>
                                <div class="validate"></div>
                            </div>
                        </div>


                        <div class="col-12">
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
                                <input class="form-control" name="refcent" id="id_referral" type="number" placeholder="Referral %*" required="required" oninvalid="this.setCustomValidity('Enter Referral %')" oninput="setCustomValidity('')">
                                <label for="id_referral">Referral %</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Add</button>
                            <div class="validate "></div>
                        </div>
                </div>
                <div class="col-md jumbotron doc-list ">
                    <h3 class="display-7 ">Available Doctors</h3>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col ">Sl</th>
                                <th scope="col ">Name</th>
                                <th scope="col ">Qualification</th>
                                <th scope="col ">Specialization</th>
                                <th scope="col ">Mobile</th>
                                <th scope="col ">Referral Percentage</th>

                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            // include 'assets\conn\conn.php';

                            $selectquery = " select * from doctor ";

                            $query = mysqli_query($con,$selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_array($query)){
                            
                            ?>

                                <tr>
                                    <th scope="row "><?php echo $res['did']; ?></th>
                                    <td><?php echo $res['dname']; ?></td>
                                    <td><?php echo $res['quali']; ?></td>
                                    <td><?php echo $res['special']; ?></td>
                                    <td><?php echo $res['mobile']; ?></td>
                                    <td><?php echo $res['refcent']; ?></td>
                                </tr>
                        <?php 

                        }
                            
                        ?>

                            
                        </tbody>
                    </table>
                </div>

            </div>
    </section>



    <script src="check_phone.js"></script>
</body>

</html>

