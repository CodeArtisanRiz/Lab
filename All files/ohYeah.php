<?php
include "assets/conn/conn.php";
$t_records = mysqli_query($con, "SELECT * From tests");
$d_records = mysqli_query($con, "SELECT * From doctor");
$z = "hello";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/select2.min.css" />

    </head>

    <body>

        <section class="container my-5 investigation">

            <div class="row input-form" id="formid">
                <div class="col-12">
                    <div class="row form-type">
                        <div class="col-2">
                            <div class="form-label-group">
                                <input type="number" name="sl" id="1" class="form-control" disabled placeholder="Serial." value="1">
                                <label for="sl">Serial</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-label-group">
                                <select class="form-control test_name" id="1">
                                    <option disabled selected>Test Name</option>
                                    <?php
                                    while ($data = mysqli_fetch_array($t_records)){
                                        echo "<option value'". $data['tname']."'>".$data['tname']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-label-group">
                                <input type="text" class="form-control" name="test_code" id="tCode1" placeholder="Test Code">
                                <label for="tCode">Test Code</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-label-group">
                                <input type="text" name="price" id="tPrice1" placeholder="Price" class="form-control">
                                <label for="test_price">Price</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <input type='button' id='but_add' value='Add new' class="btn" onclick="addColumn()">
            </div>
        </section>

        <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/js/duplicator.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/addItems.js"></script>
        <script>
            $("#test_name").select2({
                placeholder: "Select Test",
                allowClear: false
            });
            $("#ref_doc").select2({
                placeholder: "Referred by",
                allowClear: false
            });
        </script>


            <script>
            fun extract(){
                <?php 

                    $selectquery = "SELECT tcode from tests WHERE tname = "A2";

                    $query = mysqli_query($con,$selectquery);

                    $nums = mysqli_num_rows($query);

                    while($res = mysqli_fetch_assoc($query)){
                    echo $res['tcode'];
                    break;
                    }


                ?>
            }
            </script>


        <script>
            $(document).ready(function() {
            $("#formid").find("select").on('input', function() {

                var rowNo = (this.id);
                // alert(rowNo);
                // console.log(rowNO);
                $("#tCode" + rowNo).val("");
                $("#tPrice" + rowNo).val("testPrice_" + rowNo);
                // $("#tPrice" + rowNo).val(fillPrice());
                });
            });
        </script>
                
        
    </body>

    </html>