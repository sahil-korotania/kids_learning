<?php
include("header.php");
include("config.php");
$updateq="SELECT * FROM `learning_type` where id='$_GET[id]'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres)){}
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Update Learning Type</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Update Learning Type</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-4 text-center">Update Learning Type</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="form-group my-3">
                    <label for="">Learning Type Name</label>
                    <input type="text" class="form-control" name="learning_type_name" value="<?php echo $updatedata['learning_type_name']; ?>">
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
    $id = $_REQUEST["id"];
    $learning_type_name = $_REQUEST["learning_type_name"];
  
    include("config.php");
    $q = "UPDATE `learning_type` SET `learning_type_name`='$learning_type_name' WHERE `id`='$id'";
    $res = mysqli_query($conn,$q);
    if($res>0){
        echo "<script>window.location.assign('manage_learning_type.php?msg=Record Updateds')</script>";
    }
    else{
        // echo mysqli_error($conn);
        echo "<script>window.location.assign('manage_learning_type.php?msg=Try Again')</script>";
    }
}
?>