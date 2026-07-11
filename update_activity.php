<?php
include("header.php");
include("config.php");
$id = $_GET["id"];
$updateq="SELECT * FROM `activities` WHERE `id`='$id'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres))
{}
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Update Activity</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Update Activity</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-4 text-center">Update Activity form</p>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
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
                            if($data['id'] == $updatedata['learning_type'])
                            {
                        ?>
                            <option value="<?php echo $data['id']; ?>" selected><?php echo $data['learning_type_name']; ?></option>
                        <?php
                            }
                            else{
                        ?>
                            <option value="<?php echo $data['id']; ?>" ><?php echo $data['learning_type_name']; ?></option>
                        <?php
                            }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $updatedata['title']; ?>"/>
                </div>
                <div class="form-group my-3">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description"><?php echo $updatedata['description']; ?></textarea>
                </div>
                <div class="form-group my-3">
                    <label for="">Video Link</label>
                    <input type="text" class="form-control" name="video" value="<?php echo $updatedata['video']; ?>"/>
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
    $learning_type_name = $_REQUEST["learning_type_name"];
    $title = $_REQUEST["title"];
    $description = $_REQUEST["description"];
    $video = $_REQUEST["video"];
  
    include("config.php");
    $q = "UPDATE `activities` SET `learning_type`='$learning_type_name',`title`='$title',`description`='$description',`video`='$video' WHERE `id`='$id'";
    $res = mysqli_query($conn,$q);
    if($res>0){
        echo "<script>window.location.assign('manage_activity.php?msg=Record Updated')</script>";
    }
    else{
        // echo mysqli_error($conn);
        echo "<script>window.location.assign('manage_activity.php?msg=Try Again')</script>";
    }
}
?>