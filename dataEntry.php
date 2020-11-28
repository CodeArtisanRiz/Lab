<?php
include "assets/conn/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <!-- <input type="text" name="get_id" class="form-control" placeholder="enter id"> -->
                                <select name="get_id">
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                                <button type="submit" name="fetch_btn" class="btn btn-primary">Get tcode n rate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if(isset($_POST['fetch_btn'])){
                            $id= $_POST['get_id'];
                            // $id= "14";
                            $query = "SELECT * FROM tests WHERE tid='$id'";
                            $quer_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($quer_run) >0){
                                while($row = mysqli_fetch_array($quer_run)){
                                    
                                    ?>
                                    <div class="form-group">
                                        <input type="text" name="get_id" value="<?php echo $row['tcode']; ?>" class="form-control" placeholder="tc">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="get_id" value="<?php echo $row['s_price']; ?>" class="form-control" placeholder="tr">
                                    </div>
                                    <?php
                                }
                            }else{
                                echo "nothing found";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


