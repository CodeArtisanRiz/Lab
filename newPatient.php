<?php
include "assets/conn/conn.php";
$t_records = mysqli_query($con, "SELECT * From tests");
$d_records = mysqli_query($con, "SELECT * From doctor");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab - New Patient</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/select2.min.css" />
        <link rel="stylesheet" href="assets/css/style.css">
        

    </head>

    <body>

        <section class="container my-5 investigation">
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
                            <?php
                            while ($data = mysqli_fetch_array($d_records))
                            {
                                echo "<option value'". $data['dname']."'>".$data['dname']."</option>";
                            }
                            ?>
                            </select>
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
                                    <select class="form-control test_name custom-select" id="1" onchange="putVal(this.value, this.id)">
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
                                    <input type="text" name="testcode" class="form-control test_code" id="tCode1" placeholder="Test Code">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-label-group">
                                    <input type="tel" name="price" id="tPrice1" placeholder="Price" class="form-control price test_price" onchange="cal()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <input type='button' id='but_add' value='Add new' class="btn" onclick="addColumn()">
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
                                <input type="text" name="discount" id="id_discount" placeholder="Discount" class="form-control" onchange="disc()"> 
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
                                <input type="text" name="advance" id="id_advance" placeholder="Advance" class="form-control" onchange="rb()">
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

                <!-- <a href=""><input id = "id_save"class="btn float-right my-2" name="save" value="Save" onclick="mergeTCode()"></a> -->

                <button type="submit " id="id_addBtn" name= "save" class="btn btn-primary btn-xl text-uppercase center " onclick="mergeTCode()">Submit</button>
                
                <!-- <input id= "id_save" value="Save" > -->
            </form>


        </section>


        <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/js/duplicator.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


        
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/addItems.js"></script>


            <script>
            
                // Onchange function for selecting option from test name.
                function putVal(data, tid){
                    const ajaxreq = new XMLHttpRequest();
                    ajaxreq.open('GET','assets/process/getData.php?selectvalue='+data, 'TRUE');
                    ajaxreq.send();
                    ajaxreq.onreadystatechange = function(){
                        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                            var returnText = ajaxreq.responseText;
                            // alert (returnText);
                            var rT = returnText.split("~"), a = rT[0], b = rT[1];  //a = tcode, b = tprice
                            $("#tCode"+tid).val(a);
                            $("#tPrice"+tid).val(b);

                            // var total = 5;
                            // var total = total + parseInt(b);
                            // var netT = total;
                            // $("#id_total").val(total);
                            // $("#id_net_total").val(netT);
                            // var total_tests ="Total tests = " + index;
                            // alert (total_tests);

                            // for (n=1; n>=total_tests; n++){
                            //     document.getElementById("tCode" + n)
                            //     $("#id_total").val();
                            // }
                        }
                        sum();
                        disc();
                        
                        // mergeTCode();
                    }

                    // var total = b;
                    // var netT = total;
                    // $("#id_total").val(total);
                    // $("#id_net_total").val(netT);
                }
            
            // Works for first row of adding tests.
            $("#formid").find("select").on('input', function() {
                putVal(data, tid);
                
            });
            
            // $("#calc").bind("click", function(){
                function sum() {
                var amount_sum = 0;
                //calculate total worth of money
                $('.price').each(function(){
                //console.log($(this));
                //checks whether the DOM element is an input element or a div
                    if(this.tagName.toLowerCase() == "input"){
                        amount_sum += Number($(this).val());
                    }
                    // console.log(Number($(this).val()));
                });
                // alert(amount_sum);
                $("#id_total").val(amount_sum);
                }

                function disc(){
                    var discount = document.getElementById("id_discount").value;
                    var total = document.getElementById("id_total").value;
                    var nT = total - discount;
                    // alert (nT);
                    // var netTotal = amount_sum -document.getElementById("id_discount");
                    $("#id_net_total").val(nT);
                    rb();
                }
                function rb(){
                    var adv = document.getElementById("id_advance").value;
                    var nT = document.getElementById("id_net_total").value;
                    var rB = nT - adv;
                    // alert (nT);
                    // var netTotal = amount_sum -document.getElementById("id_discount");
                    $("#id_remaining_balance").val(rB);
                }

                function mergeTCode() {

                var tN = []
                $('.test_name').each(function(){
                    //console.log($(this));
                    //checks whether the DOM element is an input element or a div
                    if(this.tagName.toLowerCase() == "select"){
                        tN += $(this).val() + "~";
                    }
                    // console.log(Number($(this).val()));

                });
                console.log(tN);
                // alert (tN);

                var tC = []
                $('.test_code').each(function(){
                    if(this.tagName.toLowerCase() == "input"){
                        tC += $(this).val() + "~";
                    }
                });
                console.log(tC);
                // alert (tC);

                var tP = []
                $('.test_price').each(function(){
                    if(this.tagName.toLowerCase() == "input"){
                        tP += $(this).val() + "~";
                    }
                });
                console.log(tP);
                // alert (tN);
        }
                
            // })
            

        </script>
        <?php


        ?>

    </body>

</html>

<?php

// $testNameConca = $_GET["tN"];
// $testCodeConca = $_GET["tC"];
// $testPriceConca = $_GET["tP"];

    if(isset($_POST['save'])){

        $name=$_POST['name']; 
        $address=$_POST['address'];
        $age=$_POST['age']; 
        $mobile=$_POST['mobile'];
        $sex=$_POST['sex']; 
        $referredby=$_POST['referredby'];

        $testName = abcd;
        $testCode = efgh;
        $testPrice = ijkl;

        $total=$_POST['total'];
        $disc=$_POST['discount'];
        $netTotal=$_POST['net_total'];
        $advance=$_POST['advance'];
        $remainingAmt=$_POST['remaining_balance'];

        //$testNameConca = 
        //$testCodeConca = $_GET["tC"];
        //$testPriceConca = $_GET["tP"];

        


        echo $name;
        echo $age;
        echo $sex;
        echo $address;
        echo $mobile;
        echo $referredby;
        //echo $testNameConca;

        $insertquery = "INSERT into patients (pname,age,sex,paddress,mobile,referredBy,tName,tCode,tPrice,total,discount,netTotal,advance,remainingAmt) values('$name','$age','$sex','$address','$mobile','$referredby','$testName','$testCode','$testPrice','$total','$disc','$netTotal','$advance','$remainingAmt')";
            if(mysqli_query($con,$insertquery))
            {
                echo"<h3>Data Inserted</h3>";
                //header("location:../../tests.php");
            }
        
        //echo <script>alert('Hello Name');</script>;
    }

?>