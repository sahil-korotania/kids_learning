<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Manage User</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Manage User</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mx-auto shadow p-5">
            <p class="display-3 text-center">Manage User</p>
            <?php
                if(isset($_GET["msg"]))
                {
                    echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
                }
            ?>
            <table class="table table-bordered  ">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sno = 1;
                        include("config.php");
                        $qry = "SELECT * FROM `user`";
                        $res = mysqli_query($conn,$qry);
                        while($data = mysqli_fetch_array($res))
                        {
                    ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data["name"]; ?></td>
                        <td><?php echo $data["email"]; ?></td>
                        <td><?php echo $data["contact"]; ?></td>
                        <td><?php echo $data["address"]; ?></td>
                        <td>
                            <a href="update_user.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-edit text-success"></i>
                            </a>
                        </td>
                        <td>
                            <a href="delete_user.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $sno++;
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php
include("footer.php");
?>