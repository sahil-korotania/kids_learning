<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Manage Learning Type</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Manage Learning Type</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto shadow p-5">
            <p class="display-4 text-center">Manage Learning Type</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <table class="table table-striped">
                <tr class="bg-dark text-light">
                    <th>#</th>
                    <th>Learning Type Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    $sno=1;
                    include("config.php");
                    $q="SELECT * FROM `learning_type`";
                    $res = mysqli_query($conn,$q);
                    while($data = mysqli_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data['learning_type_name']; ?></td>
                        <td>
                            <a href="update_learning_type.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-edit text-success"></i>
                            </a>
                        </td>
                        <td>
                            <a href="delete_learning_type.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-trash text-dangerd"></i>
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