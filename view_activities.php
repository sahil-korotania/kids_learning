<?php
include("header.php");
?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4"><?php if(isset($_GET['lname'])) { echo $_GET["lname"]; } ?></h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><?php if(isset($_GET['lname'])) { echo $_GET["lname"]; } ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Classes Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Learning Activity</h1>
                </div>
                <div class="row g-4">
                    <?php 
                        include("config.php");
                        $q="SELECT `activities`.*,`learning_type`.`learning_type_name` FROM `activities` INNER JOIN `learning_type` ON `learning_type`.`id`=`activities`.`learning_type`";
                        $res = mysqli_query($conn,$q);
                        while($data = mysqli_fetch_array($res)){
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="rounded-circle w-75 mx-auto p-3">
                                <!-- <img class="img-fluid rounded-circle" src="img/classes-1.jpg" alt=""> -->
                                <iframe src="https://www.youtube.com/embed/<?php echo $data['video']; ?>?si=zsia3TjBy5vfV-rG" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""><?php echo $data['title']; ?></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;"> -->
                                        <div class="ms-3">
                                            <h6 class="text-primary mb-1"><?php echo $data['learning_type_name']; ?></h6>
                                        </div>
                                    </div>
                                    <!-- <span class="bg-primary text-white rounded-pill py-2 px-3" href="">$99</span> -->
                                </div>
                                <div class="row g-1">
                                    <div class="col-12">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-dark mb-1"><?php echo $data['description']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Classes End -->
<?php
include("footer.php");
?>