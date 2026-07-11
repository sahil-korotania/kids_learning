<?php
include("header.php");
//3. test/check session and store to use
if(!isset($_SESSION["user_email"]))
{
    echo "<script>window.location.assign('user_login.php?msg=Please login to access this page')</script>";
}
else{
    //4  store
    $user_email = $_SESSION["user_email"];
}
?>
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Dashboard</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
<p class="display-3 text-center"><?php echo $_SESSION["user_email"]?></p>
<?php
include("footer.php");
?>