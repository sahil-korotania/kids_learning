<?php
include("config.php");
$id = $_GET["id"];
$qry = "DELETE FROM `user` WHERE id='$id'";
$res = mysqli_query($conn,$qry);
if($res>0)
{
    echo "<script>window.location.assign('manage_user.php?msg=REcord Deleted')</script>";
}
else{
    echo "<script>window.location.assign('manage_user.php?msg=Try Again')</script>";
}
?>