<?php
include("header.php");
include("config.php");
$q = "select * from user where id='$_GET[id]'";
$res = mysqli_query($conn,$q);
if($updatedata = mysqli_fetch_array($res)){
    // print_r($updatedata);
}
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">User Update</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">User Update</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-3 text-center">Update User</p>
            <?php
                if(isset($_GET["msg"]))
                {
                    echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
                }
            ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $updatedata['id']; ?>">
                <div class="form-group my-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $updatedata['name']; ?>">
                </div>    
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $updatedata['email']; ?>">
                </div>
                
                <div class="form-group my-3">
                    <label for="">Contact</label>
                    <input type="number" class="form-control" name="contact" value="<?php echo $updatedata['contact']; ?>">
                </div>
                <div class="form-group my-3">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" ><?php echo $updatedata['address']; ?></textarea>
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
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
    
    //connection
    include("config.php");
    $query = "UPDATE `user` SET `name`='$name',`email`='$email',`contact`='$contact',`address`='$address' WHERE `id`='$id'";

    //execution
    $result = mysqli_query($conn,$query);

    if($result>0)
    {
        //url redirect with msg(query string)
        echo "<script>window.location.assign('manage_user.php?msg=Record Updated')</script>";
    }
    else{
        // echo mysqli_error($conn);
        echo "<script>window.location.assign('manage_user.php?msg=Try Again')</script>";
    }

}
?>