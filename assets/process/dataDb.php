<?php
include "../../assets/conn/conn.php";
$t_records = mysqli_query($con, "SELECT * From tests");
 while ($data = mysqli_fetch_array($t_records))
{
  echo "<option value'". $data['tname']."'>".$data['tname']."</option>";
  }
?>