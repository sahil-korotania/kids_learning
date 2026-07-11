<?php
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    include("config.php");
    $query = "DELETE FROM `activities` where id='$id'";
    $res = mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('manage_activity.php?msg=Record Deleted')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_activity.php?msg=Try Again')</script>";
    }
}
else{
    echo "<script>window.location.assign('manage_activity.php')</script>";
}
?>