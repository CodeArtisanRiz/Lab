<?php 
require_once('./../conn/conn.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['UName']) || empty($_POST['Password']))
       {
            header("location:./../../login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from users where UName='".$_POST['UName']."' and Pass='".$_POST['Password']."'";
            $result=mysqli_query($con,$query);
 
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['UName'];
                // $fetchname="select * from employee where Name='".$_SESSION['SName']."'";
                header("location:./../../dashboard.php");
            }
            else
            {
                header("location:./../../login.php?Invalid= Please Enter Correct User Name and Password");
               
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }
 
?>