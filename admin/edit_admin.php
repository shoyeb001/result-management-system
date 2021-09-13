<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "<script>window.open('../index.php','_self')</script>";

}else{
include("../database/database.php");
$obj = new query();

if (isset($_GET["id"])){
    $id = $obj->get_safe_str($_GET['id']);
    $cond = array("id"=>$id);

    $data = $obj->getdata("*","admin",$cond,"","","");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php

    include("header.php");
    ?>

    <div id="layoutSidenav_content" class="add-subject">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Subject</h1>
            </div>
            <div class="container">
                <div class="card" style="max-width: 500px; margin:auto">
                    <div class="card-body">
                        <form  method="POST" id="form-id">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $data[0]["name"]?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="<?php echo $data[0]["email"]?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" name="password" value="<?php echo $data[0]["password"]?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <?php

        include("footer.php");
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>

<?php


if (isset($_POST["submit"])) {
    $name = $obj->get_safe_str($_POST['name']);
    $email = $obj->get_safe_str($_POST['email']);
    $password = $obj->get_safe_str($_POST['password']);


    $item = array("name"=>$name,"email"=>$email,"password"=>"$password");

    $obj->updateData("admin",$item,"id",$id);
    echo "<script>window.open('admin.php','_self')</script>";


}
}

?>