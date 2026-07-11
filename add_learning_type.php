<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Add Learning Type</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Add Learning Type</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-4 text-center">Add Learning Type form</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post">
                <div class="form-group my-3">
                    <label for="">Learning Type Name</label>
                    <input type="text" class="form-control" name="learning_type_name">
                </div>
                <button type="submit" name="submit" class="btn btn-dark col-md-4 d-block mx-auto rounded-pill btn-lg">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
    $learning_type_name = $_REQUEST["learning_type_name"];
  
    include("config.php");
    $q = "INSERT INTO `learning_type`(`learning_type_name`) VALUES ('$learning_type_name')";
    $res = mysqli_query($conn,$q);
    if($res>0){
        echo "<script>window.location.assign('add_learning_type.php?msg=Record Inserted')</script>";
    }
    else{
        // echo mysqli_error($conn);
        echo "<script>window.location.assign('add_learning_type.php?msg=Try Again')</script>";
    }
}
?>