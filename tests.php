<?php 
   include 'assets/conn/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab - Tests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="assets/select2.min.css" />
</head>

<body>
    <section>


        <div class="container my-5">
            <div class="row">

                <div class="col-4 jumbotron add">
                    <form action="assets/process/TestAdd.php" method="POST">

                        <h3 class="display-7">Add Test</h3>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input type="text" id="id_t_code" class="form-control" name="tcode" placeholder="Test code" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                <label for="t_code">Test code</label>
                                <div class="validate"></div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="tname" id="t_name" type="text" placeholder="Test name*" required="required" oninvalid="this.setCustomValidity('Enter Qualification')" oninput="setCustomValidity('')" id="name">
                                <label for="t_name">Test name</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="select-menu">
                                    <!-- <label for="id_vial">Vial</label> -->
                                    <select name="vial" id="id_vial" class="custom-select">
                                        <option value="" disabled selected="">Select Vial Type</option>
                                        <option value="Yellow Vial">Yellow Vial</option>
                                        <option value="Red Vial">Red Vial</option>
                                        <option value="Purple Vial (EDTA)">Purple Vial (EDTA)</option>
                                        <option value="Grey Vial">Grey Vial</option>
                                        <option value="Black Vial">Black Vial</option>
                                        <option value="Blue Vial">Blue Vial</option>
                                        <option value="Urine Container">Urine Container</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="tcp" id="t_cp" type="number" placeholder="Phone*" required="required" oninvalid="this.setCustomValidity('Enter CP')" oninput="setCustomValidity('')">
                                <label for="t_cp">Cost</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-label-group">
                                <input class="form-control" name="trate" id="t_rate" type="number" placeholder="Rate*" required="required" oninvalid="this.setCustomValidity('Enter Rate')" oninput="setCustomValidity('')">
                                <label for="t_rate">Rate</label>
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit " id="id_addBtn" name= "submit" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Add</button>
                            <div class="validate "></div>
                        </div>
                </div>
                <div class="col-8 jumbotron doc-list ">
                    <h3 class="display-7 ">List of Tests</h3>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col ">Sl</th>
                                <th scope="col ">Test code</th>
                                <th scope="col ">Test name</th>
                                <th scope="col ">Vial type</th>
                                <th scope="col ">Cost</th>
                                <th scope="col ">Rate</th>
                                <th scope="col " colspan="2">Operations</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $selectquery = " select * from tests ";

                            $query = mysqli_query($con,$selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <th scope="row "><?php echo $res['tid']; ?></th>
                                    <td><?php echo $res['tcode']; ?></td>
                                    <td><?php echo $res['tname']; ?></td>
                                    <td><?php echo $res['vial_type']; ?></td>
                                    <td><?php echo $res['c_price']; ?></td>
                                    <td><?php echo $res['s_price']; ?></td>
                                    <td><a href="testUpdate.php?ids=<?php echo $res['tid']?>&tc=<?php echo $res['tcode']?>&tn=<?php echo $res['tname']?>&vt=<?php echo $res['vial_type']?>&cp=<?php echo $res['c_price']?>&sp=<?php echo $res['s_price'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                    <td><a href="assets/process/testDel.php?ids=<?php echo $res['tid']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
    <script src="https://use.fontawesome.com/0a050084c3.js"></script>
    <!-- <script src="dropdown.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/select2.min.js"></script>
    <script>
        $("#id_vial").select2({
            placeholder: "Select Vial",
            allowClear: true
        });
    </script>
</body>

</html>