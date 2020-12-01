<?php
include "conn.php";
$t_records = mysqli_query($con, "SELECT * From tests");
$d_records = mysqli_query($con, "SELECT * From doctor");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>

        <section class="container my-5 investigation">
            <form class="" method=""  id="formid">
                <div class="row input-form" id="inputf">
                    <div class="col-12">
                        <div class="row form-type">
                        <div class="col-3">
                                <div class="form-label-group">
                                <input type="number" name="sl" id="1" class="form-control" disabled placeholder="Serial." value="1" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-label-group">
                                    <select class="form-control test_name" id="1" onchange="mylang(this.value, this.id)">
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
                            <div class="col-3">
                                <div class="form-label-group">
                                    <input type="text" class="form-control test_code" id="tCode1">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-label-group">
                                    <input type="number" class="form-control test_price" id="tPrice1">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-1">
                    <input type='button' id='but_add' value='Add new' class="btn" onclick="addColumn()">
                </div>
            </form>


        </section>
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="addItems.js"></script>
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
                function mylang(data, tid){
                    const ajaxreq = new XMLHttpRequest();
                    ajaxreq.open('GET','getdata.php?selectvalue='+data, 'TRUE');
                    ajaxreq.send();
                    ajaxreq.onreadystatechange = function(){
                        if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                            var returnText = ajaxreq.responseText;
                            var returnText = str.split('~'),a=array[0], b=array[1];
                            $("#tCode"+tid).val(a);
                            $("#tCode"+tid).val(b);
                            
                            // document.getElementById('tcode').innerHTML = ajaxreq.responseText;
                        }
                    }
                }
            </script>
            <script>
            $("#formid").find("select").on('input', function() {
                mylang(data, tid);
            });
        </script>


    </body>

    </html>