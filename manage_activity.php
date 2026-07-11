<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Manage Activity</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Manage Activity</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto shadow p-5">
            <p class="display-4 text-center">Manage Activity</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <table class="table table-striped">
                <tr class="bg-dark text-light">
                    <th>#</th>
                    <th>Learning Type</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Video</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    $sno=1;
                    include("config.php");
                    $q="SELECT `activities`.*,`learning_type`.`learning_type_name` FROM `activities` INNER JOIN `learning_type` ON `learning_type`.`id`=`activities`.`learning_type`";
                    $res = mysqli_query($conn,$q);
                    while($data = mysqli_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data['learning_type_name']; ?></td>
                        <td><?php echo $data['title']; ?></td>
                        <td><?php echo $data['description']; ?></td>
                        <td>
                            <iframe width="360" height="215" src="https://www.youtube.com/embed/<?php echo $data['video']; ?>?si=zsia3TjBy5vfV-rG" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </td>
                        <td>
                            <a href="update_activity.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-edit text-success"></i>
                            </a>
                        </td>
                        <td>
                            <a href="delete_activity.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                    $sno++;
                    }
                ?>
            </table>
        </div>
    </div>
</div>