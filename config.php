<?php

$conn = mysqli_connect("localhost","root","","kids_learning");

if(!$conn)
{
    echo mysqli_error($conn);
}
?>