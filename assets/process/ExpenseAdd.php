<?php
    include '../conn/conn.php';
    if(!$con){
        die(' Please Check Your Connection'.mysqli_error($con));
    }
    session_start();
        if(isset($_SESSION['User'])){
          $uname=$_SESSION['User']; 
          $query="select * from users where UName='$uname' ";
          $sql = mysqli_query($con,$query); 
          if(mysqli_num_rows($sql)>0){
            while($row=mysqli_fetch_assoc($sql)){
              $userName=$row['UName'];
            }
          }
        }
        else {
            header("location:login.php");
        }

    if(isset($_POST['submit'])){
        $ename=trim($_POST['e_name']);
        $eamount=trim($_POST['e_amount']);
        

        if(empty($ename) || empty($eamount))
        {
            echo '<script>alert("Please fill up the empty fields..");</script>' ;
            header("location:../../expense.php");
        }
        else{

            $insertquery = "insert into expense(e_name, e_amount, loggedUser) values('$ename','$eamount','$userName')";
            if(mysqli_query($con,$insertquery))
            {
                // echo"<h3>Data Inserted</h3>";
                header("location:../../expense.php");
            }
        }
    }
?>