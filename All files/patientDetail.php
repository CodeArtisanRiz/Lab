<?php 
    include 'assets/conn/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Details</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>

    <body>
    <section class="container my-5 investigation">
            <form class="" method="POST"  id="formid">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="number" id="id_id" class="form-control" placeholder="ID" name="id">
                                    <!-- <label for="id_id">ID</label> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="id_name" class="form-control" placeholder="Name" name="name">
                                    <!-- <label for="id_name">Name</label> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="id_address" name="address" class="form-control" placeholder="Address">
                                    <!-- <label for="id_address">Address</label> -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="date" name="date" id="id_date" class="form-control">
                                    <!-- <label for="id_date">Date</label> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" name="age" id="id_age" placeholder="Age">
                                    <!-- <label for="id_age">Age</label> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="tel" class="form-control" name="mobile" id="id_mobile" placeholder="Mobile">
                                    <!-- <label for="id_mobile">Mobile</label> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="time" name="time" id="id_time" class="form-control">
                                    <!-- <label for="id_time">Time</label> -->
                                </div>
                            </div>
                            <div class="col-12">
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
                            <div class="col-12">
                                <div class="form-label-group">
                                <select class="form-control custom-select" id="ref_doc" name="referredby">
                            <option disabled selected>Referred by</option>
                            </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                </div>


        
        <script src="https://use.fontawesome.com/0a050084c3.js"></script>
                            
        <script src="../../assets/js/check_phone.js"></script>
    </body>

</html>
