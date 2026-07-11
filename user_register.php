<?php
include("header.php");
?>

<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">User Register</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">User Register</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto shadow p-5">
            <p class="display-3 text-center">Register form</p>
            <?php
                if(isset($_GET["msg"]))
                {
                    echo "<div class='alert alert-info'>".$_GET['msg']."</div>";
                }
            ?>
            <p id="error" class="text-danger display-4"></p>
            <form method="post" onsubmit="return submitform()">
                <div class="form-group my-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>    
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <span class="text-danger" id="emailerror"></span>
                    <input type="text" class="form-control" name="email" id="email" onblur="checkemail()">
                </div>
                <div class="form-group my-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group my-3">
                    <label for="">Contact</label>
                    <span class="text-danger" id="contacterror"></span>

                    <input type="text" class="form-control" name="contact" id="contact" onblur="checkcontact()">
                </div>
                <div class="form-group my-3">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-dark col-md-4 d-block mx-auto rounded-pill btn-lg">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function submitform(){
        // alert("Helo")
        //get value 
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        // alert(name)
        // alert(email)
        // alert(password)
        
        if(name=="" || email=="" || password=="")
        {
            // alert("Please fill COmplete form");
            // set value
            document.getElementById("error").innerHTML = "Please fill complete form"
            return false   
        }
    }

    function checkemail(){
        // alert("Hello class");
        //get value
        var email = document.getElementById("email").value
        var patt = /^[a-zA-Z0-9\.\-\_]+\@+[A-Za-z0-9]+\.+[a-zA-Z]{2,3}$/;
        
        // alert(email+" "+typeof(email))
        // alert(patt+" "+typeof(patt))

        if(patt.test(email))
        {
            // alert("Matched")
            document.getElementById("emailerror").innerHTML=""

        }
        else{
            // alert("Email not matched")
            //set value
            document.getElementById("emailerror").innerHTML="*"
        }
    }

    function checkcontact(){
        //get value
        var contact = document.getElementById("contact").value
        var patt = /^[6-9]{1}[0-9]{9}$/;
        
        if(patt.test(contact))
        {
            // alert("Matched")
            document.getElementById("contacterror").innerHTML=""

        }
        else{
            // alert("Email not matched")
            //set value
            document.getElementById("contacterror").innerHTML="*"
        }
    }
</script>
<?php
include("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = MD5($_REQUEST["password"]);
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
  
    //connection
    include("config.php");
    
    $query = "INSERT INTO `user`(`name`, `email`, `password`, `contact`, `address`) VALUES ('$name','$email','$password','$contact','$address')";

    //execution
    $result = mysqli_query($conn,$query);

    if($result>0)
    {
        //url redirect with msg(query string)
        echo "<script>window.location.assign('user_register.php?msg=Record Inserted')</script>";
    }
    else{
        echo mysqli_error($conn);
        echo "<script>window.location.assign('user_register.php?msg=Try Again')</script>";
    }

}
?>