<?php
// 1. initialization
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My PRoject</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider School</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <?php
                        if(isset($_SESSION["email"]))
                        {
                    ?>
                        <a href="dashboard.php" class="nav-item nav-link">Dashboard</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Learning Type</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <a href="add_learning_type.php" class="dropdown-item">Add</a>
                                <a href="manage_learning_type.php" class="dropdown-item">Manage</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Activity</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <a href="add_activity.php" class="dropdown-item">Add</a>
                                <a href="manage_activity.php" class="dropdown-item">Manage</a>
                            </div>
                        </div>
                        <a href="manage_user.php" class="nav-item nav-link">Users</a>
                        <a href="view_progress.php" class="nav-item nav-link">Progress</a>
                        <a href="view_suggestions.php" class="nav-item nav-link">Suggestions</a>
                        <a href="admin_logout.php" class="nav-item nav-link">Logout</a>

                    <?php
                        }
                        else if(isset($_SESSION["user_email"])){
                    ?>
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About Us</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Learnings</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <?php 
                                    include("config.php");
                                    $hq = "SELECT * FROM `learning_type`";
                                    $hres = mysqli_query($conn,$hq);
                                    while($hdata = mysqli_fetch_array($hres)){
                                ?>
                                <a href="view_activities.php?id=<?php echo $hdata['id']; ?>&lname=<?php echo $hdata['learning_type_name']; ?>" class="dropdown-item"><?php echo $hdata['learning_type_name']; ?></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Progress</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <a href="add_progress.php" class="dropdown-item">Add</a>
                                <a href="manage_progress.php" class="dropdown-item">Manage</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Suggestion</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <a href="add_suggestion.php" class="dropdown-item">Add</a>
                                <a href="manage_suggestion.php" class="dropdown-item">Manage</a>
                            </div>
                        </div>
                        <a href="user_logout.php" class="nav-item nav-link">Logout</a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About Us</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Learnings</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <?php 
                                    include("config.php");
                                    $hq = "SELECT * FROM `learning_type`";
                                    $hres = mysqli_query($conn,$hq);
                                    while($hdata = mysqli_fetch_array($hres)){
                                ?>
                                <a href="view_activities.php?id=<?php echo $hdata['id']; ?>&lname=<?php echo $hdata['learning_type_name']; ?>" class="dropdown-item"><?php echo $hdata['learning_type_name']; ?></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                        <a href="admin_login.php" class="nav-item nav-link">Admin Login</a>
                        <a href="user_login.php" class="nav-item nav-link">User Login</a>
                        <a href="user_register.php" class="nav-item nav-link">Register</a>
                    <?php
                        }
                    ?>
                </div>
               
            </div>
        </nav>
        <!-- Navbar End -->