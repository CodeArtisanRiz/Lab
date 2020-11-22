<?php
include "assets/conn/conn.php";
$t_records = mysqli_query($con, "SELECT * From tests");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="assets/select2.min.css" />

    </head>

    <body>

        <section class="container my-5 investigation">
            <form action="" class="" method="">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="number" id="id_id" class="form-control" placeholder="ID" name="id">
                                    <label for="id_id">ID</label>
                                </div>
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
                                <div class="form-label-group">
                                    <input type="date" name="date" id="id_date" class="form-control">
                                    <label for="id_date">Date</label>
                                </div>
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
                                <div class="form-label-group">
                                    <input type="time" name="time" id="id_time" class="form-control">
                                    <label for="id_time">Time</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" name="sex" id="id_sex" placeholder="Sex" class="form-control">
                                    <label for="">Sex</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" class="form-control" placeholder="Reffered By" name="reffered_by" id="id_reffered_by">
                                    <label for="id_reffered_by">Reffered By</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row input-form">
                    <div class="col-2">
                        <div class="form-label-group">
                            <input type="number" name="sl_no" id="id_sl_no" class="form-control" disabled placeholder="Serial." value="1">
                            <label for="id_sl_no">Serial.</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-label-group">
                            <!-- <input type="text" class="form-control" name="test_name" id="id_test_name" placeholder="Test Name">
                        <label for="id_test_name">Test Name</label> -->
                            <select class="form-control" id="test_name">
                            <option disabled selected> Test Name</option>
                            <?php
                            while ($data = mysqli_fetch_array($t_records))
                            {
                                echo "<option value'". $data['tname']."'>".$data['tname']."</option>";
                                // $query="select * from tests where tname='".$_POST['tname'];
                                // echo "<option value'". $data['tcode']."'>".$data['tcode']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-label-group">
                            <input type="text" disabled class="form-control" name="test_code" id="id_test_code" placeholder="Test Code">
                            <label for="id_test_name">Test Code</label>

                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-label-group">
                            <input type="text" disabled name="price" id="id_price" placeholder="Price" class="form-control">
                            <label for="id_price">Price</label>
                            <!-- <select class="form-control"> -->
                            <!-- <option disabled selected> Rate</option> -->
                            <?php
                            while ($data = mysqli_fetch_array($t_records))
                            {
                                // echo "<option value'". $data['s_price']."'>".$data['s_price']."</option>";
                        
                            }
                            ?>
                                <!-- </select> -->
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <input type='button' id='but_add' value='Add new' class="btn">
                </div>

                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" name="total" id="id_total" placeholder="Total" class="form-control">
                                <label for="id_total">Total</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" name="discount" id="id_discount" placeholder="Discount" class="form-control">
                                <label for="id_discount">Discount</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" name="net_total" id="id_net_total" placeholder="Net Total" class="form-control">
                                <label for="id_net_total">Net Total</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" name="advance" id="id_advance" placeholder="Advance" class="form-control">
                                <label for="id_advance">Advance</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" name="remaining_balance" id="id_remaining_balance" placeholder="Remaining Balance" class="form-control">
                                <label for="id_remaining_balance">Remaining Amount</label>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Save & Print" class="btn float-right my-2">
            </form>


        </section>


        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="assets/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/duplicator.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


        
        <script src="assets/select2.min.js"></script>
        <script>
            $("#test_name").select2({
                placeholder: "Select Test",
                allowClear: true
            });
        </script>
    </body>

    </html>