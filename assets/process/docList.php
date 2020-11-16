<?php

include 'assets\conn\conn.php';

$selectquery = " select * from doctor ";

$query = mysqli_query($con,$selectquery);

$nums = mysqli_num_rows($query);

while($res = mysqli_fetch_array($query)){
    echo $res['dname'] . "<br>";
}
?>

//This page is to under how listing module works.
//This page is not functional.