<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Add Progress</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Add Progress</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-4 text-center">Add Progress form</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="">Learning Type</label>
                    <select class="form-control" name="learning_type_name">
                        <option value="" disabled selected>Choose Learning</option>
                        <?php 
                            $sno=1;
                            include("config.php");
                            $q="SELECT * FROM `learning_type`";
                            $res = mysqli_query($conn,$q);
                            while($data = mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $data['id']; ?>" ><?php echo $data['learning_type_name']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="">Child Name</label>
                    <input type="text" class="form-control" name="child_name"/>
                </div>
                <div class="form-group my-3">
                    <label for="">Age</label>
                    <input type="text" class="form-control" name="age"/>
                </div>
                <div class="form-group my-3">
                    <label for="">Progress Date</label>
                    <input type="date" class="form-control" name="progress_date"/>
                </div>
                <div class="form-group my-3">
                    <label for="">Progress Picture</label>
                    <input type="file" class="form-control" name="progress_picture"/>
                </div>
                <div class="form-group my-3">
                    <label for="">Progress Percentage</label>
                    <input type="number" class="form-control" name="percentage" min="0" max="100"/>
                </div>
                <div class="form-group my-3">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description"></textarea>
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
    $learning_type_name = $_REQUEST["learning_type_name"];
    $child_name = $_REQUEST["child_name"];
    $description = $_REQUEST["description"];
    $age = $_REQUEST["age"];
    $progress_date = $_REQUEST["progress_date"];
    $percentage = $_REQUEST["percentage"];
    
    $fname = $_FILES["progress_picture"]["name"];
    $ftmpname = $_FILES["progress_picture"]["tmp_name"];
    $new_name = rand().$fname;
    move_uploaded_file($ftmpname,"progress_images/".$new_name);
    
    include("config.php");
    $q = "INSERT INTO `child_progress`(`user`, `child_name`, `age`, `learning_type`, `description`, `percentage`, `date_of_progress`, `attachment`) VALUES ('$_SESSION[user_email]','$child_name','$age','$learning_type_name','$description','$percentage','$progress_date','$new_name')";
    $res = mysqli_query($conn,$q);
    if($res>0){
        echo "<script>window.location.assign('add_progress.php?msg=Record Inserted')</script>";
    }
    else{
        // echo mysqli_error($conn);
        echo "<script>window.location.assign('add_progress.php?msg=Try Again')</script>";
    }
}
?>