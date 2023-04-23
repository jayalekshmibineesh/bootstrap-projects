<?php
 include 'connection.php';
 $id1=$_GET['id'];
mysqli_query($con,"delete from bootstrap_tb1 WHERE id='$id1'");
mysqli_query($con,"delete from login WHERE id='$id1'");
 echo"<script>alert('deleted succesfully')</script>";
 echo"<script>window.location.href-Viewboot1.php</script>";

?>