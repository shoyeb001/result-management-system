<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "<script>window.open('../index.php','_self')</script>";

}else{

include("../database/database.php");
$obj = new query();
$result = $obj->getdata("*", "subjects", "", "", "", "");

if (isset($_GET["id"])){
    $id = $obj->get_safe_str($_GET['id']);
    $cond = array("id"=>$id);

    $data = $obj->getdata("*","student",$cond,"","","");
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
    <title>Edit Result</title>
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
                <h1 class="mt-4">Edit Result</h1>
            </div>
            <div class="container">
                <div class="card" style="max-width: 500px; margin:auto">
                    <div class="card-body">
                    <form method="POST" id="form-id" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $data[0]["name"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Gurdian's Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="g_name" value="<?php echo $data[0]["gname"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="address" value="<?php echo $data[0]["address"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Student Photo</label>
                                <input class="form-control" name="image" type="file" id="formFile" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Roll</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="roll" value="<?php echo $data[0]["roll_no"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="exampleFormControlInput1" name="dob" value="<?php echo $data[0]["dob"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject1</label>
                                <select class="form-select" aria-label="Default select example" name="subject1" required>
                                    <option selected value="<?php echo $data[0]["subject1"] ?>"><?php echo $data[0]["subject1"] ?></option>
                                    <?php
                                    foreach ($result as $sub) {
                                    ?>
                                        <option value="<?php echo $sub["name"] ?>"><?php echo $sub["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Marks</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="marks1" value="<?php echo $data[0]["marks1"] ?>"  required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject2</label>
                                <select class="form-select" aria-label="Default select example" name="subject2" required>
                                    <option value="<?php echo $data[0]["subject2"] ?>" selected><?php echo $data[0]["subject2"]?></option>
                                    <?php
                                    foreach ($result as $sub) {
                                    ?>
                                        <option value="<?php echo $sub["name"] ?>"><?php echo $sub["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Marks</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="marks2" value="<?php echo $data[0]["marks2"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject3</label>
                                <select class="form-select" aria-label="Default select example" name="subject3" value="<?php echo $data[0]["subject3"] ?>" required>
                                    <option selected><?php echo $data[0]["subject3"]?></option>
                                    <?php
                                    foreach ($result as $sub) {
                                    ?>
                                        <option value="<?php echo $sub["name"] ?>"><?php echo $sub["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Marks</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="marks3" value="<?php echo $data[0]["marks3"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject4</label>
                                <select class="form-select" aria-label="Default select example" name="subject4" value="<?php echo $data[0]["subject4"] ?>" required>
                                    <option selected><?php echo $data[0]["subject4"]?></option>
                                    <?php
                                    foreach ($result as $sub) {
                                    ?>
                                        <option value="<?php echo $sub["name"] ?>"><?php echo $sub["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Marks</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="marks4" value="<?php echo $data[0]["marks4"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject5</label>
                                <select class="form-select" aria-label="Default select example" name="subject5" value="<?php echo $data[0]["subject5"] ?>" required>
                                    <option selected><?php echo $data[0]["subject5"]?></option>
                                    <?php
                                    foreach ($result as $sub) {
                                    ?>
                                        <option value="<?php echo $sub["name"] ?>"><?php echo $sub["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Marks</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="marks5" value="<?php echo $data[0]["marks5"] ?>" required>
                                
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
    $roll = $obj->get_safe_str($_POST['roll']);
    $gname = $obj->get_safe_str($_POST['g_name']);
    $address = $obj->get_safe_str($_POST['address']);
    $dob = $obj->get_safe_str($_POST['dob']);
    $sub1 = $obj->get_safe_str($_POST['subject1']);
    $sub2 = $obj->get_safe_str($_POST['subject2']);
    $sub3 = $obj->get_safe_str($_POST['subject3']);
    $sub4 = $obj->get_safe_str($_POST['subject4']);
    $sub5 = $obj->get_safe_str($_POST['subject5']);
    $marks1 = $obj->get_safe_str($_POST['marks1']);
    $marks2 = $obj->get_safe_str($_POST['marks2']);
    $marks3 = $obj->get_safe_str($_POST['marks3']);
    $marks4 = $obj->get_safe_str($_POST['marks4']);
    $marks5 = $obj->get_safe_str($_POST['marks5']);
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../img/$filename";
    $obj->upload_file($tempname, $folder);  //uploading image


    $item_arr = array("name" => $name, "gname"=>$gname, "address"=>$address, "image" => $filename, "roll_no" => $roll, "dob" => $dob, "subject1" => $sub1, "subject2" => $sub2, "subject3" => $sub3, "subject4" => $sub4, "subject5" => $sub5,"marks1"=>$marks1,"marks2"=>$marks2,"marks3"=>$marks4,"marks4"=>$marks4,"marks5"=>$marks5);

    $obj->updateData("student",$item_arr,"id",$id);
    echo "<script>window.open('result.php','_self')</script>";




}
}

?>