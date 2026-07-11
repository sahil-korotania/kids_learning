<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">View Progress</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">View Progress</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto shadow p-5">
            <p class="display-4 text-center">View Progress</p>
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
                    <th>Child Name</th>
                    <th>Age</th>
                    <th>Description</th>
                    <th>Percentage</th>
                    <th>Date of Progress</th>
                    <th>Attachment</th>
                </tr>
                <?php 
                    $sno=1;
                    include("config.php");
                    $q="SELECT `child_progress`.*,`learning_type`.`learning_type_name` FROM `child_progress` INNER JOIN `learning_type` ON `child_progress`.`learning_type`=`learning_type`.`id`";
                    $res = mysqli_query($conn,$q);
                    while($data = mysqli_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data['learning_type_name']; ?></td>
                        <td><?php echo $data['child_name']; ?></td>
                        <td><?php echo $data['age']; ?></td>
                        <td><?php echo $data['description']; ?></td>
                        <td><?php echo $data['percentage']; ?>%</td>
                        <td><?php echo $data['date_of_progress']; ?></td>
                        <td>
                            <img src="progress_images/<?php echo $data['attachment']; ?>" alt="" style="width:150px; height:150px;">
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