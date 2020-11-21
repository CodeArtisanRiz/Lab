<?php 
    include 'assets/conn/conn.php';

    $tids = $_GET['ids'];
    $tcode = $_GET['tc'];
    $tname = $_GET['tn'];
    $vial = $_GET['vt'];
    $cp = $_GET['cp'];
    $sp = $_GET['sp'];
    
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
                        <form action="" method="POST">


                            <h3 class="display-7">Edit / Update Doctor</h3>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="id_t_id" class="form-control" name="tid" value="<?php echo "$tids"; ?>" disabled placeholder="Test code" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                    <label for="t_code">Test ID</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="id_t_code" class="form-control" name="tcode" value="<?php echo "$tcode"; ?>" placeholder="Test code" required="required" oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                    <label for="t_code">Test code</label>
                                    <div class="validate"></div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-label-group">
                                    <input class="form-control" name="tname" id="t_name" type="text" value="<?php echo "$tname"; ?>" placeholder="Test name*" required="required" oninvalid="this.setCustomValidity('Enter Qualification')" oninput="setCustomValidity('')" id="name">
                                    <label for="t_name">Test name</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <div class="select-menu">
                                        <!-- <label for="id_vial">Vial</label> -->
                                        <select name="vial" id="id_vial" value="<?php echo "$vial"; ?>" class="custom-select">
                                            <option value="<?php echo "$vial"; ?>" disabled selected><?php echo "$vial"; ?></option>
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
                                    <input class="form-control" name="tcp" id="t_cp" value="<?php echo "$cp"; ?>" type="number" placeholder="Phone*" required="required" oninvalid="this.setCustomValidity('Enter CP')" oninput="setCustomValidity('')">
                                    <label for="t_cp">Cost</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group">
                                    <input class="form-control" name="trate" id="t_rate" value="<?php echo "$sp"; ?>" type="number" placeholder="Rate*" required="required" oninvalid="this.setCustomValidity('Enter Rate')" oninput="setCustomValidity('')">
                                    <label for="t_rate">Rate</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit " id="id_addBtn" name= "update" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Update</button>
                                <div class="validate "></div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>


        
        <script src="https://use.fontawesome.com/0a050084c3.js"></script>
                            
        <script src="check_phone.js"></script>
    </body>

</html>

<?php
    
    if(isset($_POST['update'])){
      
        $tid=$tids;
        $tcode=trim($_POST['tcode']);                       //trim is used to omitt white space at first and last
        $tname=trim($_POST['tname']);
        $vial=trim($_POST['vial']);
        $tcp=trim($_POST['tcp']);
        $tsp=trim($_POST['trate']);

        if(empty($tcode) || empty($tname) || empty($vial) || empty($tcp) || empty($tsp))
        {
            echo '<script>alert("Please fill up the empty fields..");</script>' ;

        }
        else{
            $update = " UPDATE tests set tid='$tid',tcode='$tcode',tname='$tname', vial_type='$vial',c_price='$tcp',s_price='$tsp' WHERE tid='$tid' ";
                                    
            $res = mysqli_query($con,$update);

            if($res){
                echo '<script>alert("Record Updated..");</script>' ;
                
                // header not working look for fix
                // header("location:doc.php");
                ?>
                <script>
                window.location.replace("tests.php");
                </script>
                <?php
            }
            else{
                echo '<script>alert("Error. Record Not Updated..");</script>' ;
            }

        }
        
    }
    else {

    }
    // echo ' Not Working';
    //trim
    //htmlentities
?>


