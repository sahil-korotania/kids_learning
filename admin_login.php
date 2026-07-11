<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Login</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-3 text-center">Login form</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post">
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group my-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-dark col-md-4 d-block mx-auto rounded-pill btn-lg">Login</button>
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
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    include("config.php");
    $q = "select * from admin_login where email='$email' and password='$password'";
    $res = mysqli_query($conn,$q);
    if($data = mysqli_fetch_array($res)){
        //2 . session create
        $_SESSION["email"]= $data["email"];
        
        echo "<script>window.location.assign('dashboard.php')</script>";
    }
    else{
        echo "<script>window.location.assign('admin_login.php?msg=Invalid credentials')</script>";
    }
}
?>