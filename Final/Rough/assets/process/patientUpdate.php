<?php 
    include '../../assets/conn/conn.php';

    $id = $_GET['id'];

                            $query = " SELECT * from patients where pid = $id";
                            // $query = " SELECT * from patients WHERE mobile LIKE '%{$name1}%'";
                            $result = mysqli_query($con,$query);

                            $nums = mysqli_num_rows($result);

                            while($res = mysqli_fetch_assoc($result)){

                                $remainingAmt = $res['remainingAmt'];
                                $total = $res['total'];
                            }

    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/style2.css">
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
                                    <input type="text" id="id_did" class="form-control" name="did" value="<?php echo "$id"; ?>" placeholder="Patient ID" va required="required" disabled oninvalid="this.setCustomValidity('Enter Doctor Name')" oninput="setCustomValidity('')">
                                    <label for="id_did">Patient ID</label>
                                    <div class="validate"></div>
                                </div>
                            </div>

                                <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="id_name" class="form-control" name="dname" value="<?php echo "$total"; ?>" placeholder="Total">
                                    <label for="id_name">Total</label>
                                    <div class="validate"></div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-label-group">
                                    <input class="form-control" name="remaining" value="<?php echo "$remainingAmt"; ?>" id="id_remaining" type="text">
                                    <label for="id_remaining">Remaining Amount</label>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" name="update" id="id_addBtn" class="btn btn-primary btn-xl text-uppercase center " onclick="return checkEmpty()" value="Send ">Update</button>
                                <div class="validate "></div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>


        
        <script src="https://use.fontawesome.com/0a050084c3.js"></script>
                            
        <script src="../../assets/js/check_phone.js"></script>
    </body>

</html>

<?php
    
    if(isset($_POST['update'])){
      
        $did=$ids;
        $dname=trim($_POST['dname']);                       //trim is used to omitt white space at first and last
        $qualification=trim($_POST['qualification']);
        $specialization=trim($_POST['specialization']);
        $mobile=trim($_POST['phone']);
        $refcent=trim($_POST['refcent']);

        if(empty($dname) || empty($qualification) || empty($specialization) || empty($mobile) || empty($refcent))
        {
            echo '<script>alert("Please fill up the empty fields..");</script>' ;

        }
        else{
            $update = " UPDATE doctor set did='$did',dname='$dname',mobile='$mobile', quali='$qualification',special='$specialization',refcent='$refcent' WHERE did='$ids' ";
                                    
            $res = mysqli_query($con,$update);

            if($res){
                echo '<script>alert("Record Updated..");</script>' ;
                
                // header not working look for fix
                // header("location:doc.php");
                ?>
                <script>
                window.location.replace("../../doc.php");
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


