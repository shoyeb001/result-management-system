<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "<script>window.open('../index.php','_self')</script>";

}else{
include("../database/database.php");
$obj = new query();

if (isset($_GET["delete"])) {
    $id = $_GET['delete'];
    $arr = array("id"=>$id);
    $obj->deletedata("student",$arr);
    header("Location:student.php");

}



$data = $obj->getdata("*", "student", "", "", "", "");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php

    include("header.php");
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Result & Student</h1>
                <a class="btn btn-primary" href="add_result.php">Add Result</a>
            </div>
            <div class="container">
                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Roll</th>
                            <th scope="col">Gurdian's Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Photo</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Subject1</th>
                            <th scope="col">marks</th>
                            <th scope="col">Subject2</th>
                            <th scope="col">marks</th>
                            <th scope="col">Subject3</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Subject4</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Subject5</th>
                            <th scope="col">Marks</th>
                            <th scope="col" style="width:200px">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i = 1;

                        if (sizeof($data) == 0) {
                            echo "No Subject Found";
                        } else {
                            foreach ($data as $list) {

                        ?>
                                <tr>

                                    <td><?php echo $list["name"] ?></td>
                                    <td><?php echo $list["roll_no"] ?></td>
                                    <td><?php echo $list["gname"] ?></td>
                                    <td><?php echo $list["address"] ?></td>
                                    <td><img class="std-img" src="../img/<?php echo $list['image']?>"></td>
                                    <td><?php echo $list["dob"] ?></td>
                                    <td><?php echo $list["subject1"] ?></td>
                                    <td><?php echo $list["marks1"] ?></td>
                                    <td><?php echo $list["subject2"] ?></td>
                                    <td><?php echo $list["marks2"] ?></td>
                                    <td><?php echo $list["subject3"] ?></td>
                                    <td><?php echo $list["marks3"] ?></td>
                                    <td><?php echo $list["subject4"] ?></td>
                                    <td><?php echo $list["marks4"] ?></td>
                                    <td><?php echo $list["subject5"] ?></td>
                                    <td><?php echo $list["marks5"] ?></td>
                                    <td><a class="btn btn-danger main-btn" href="result.php?delete=<?php echo $list["id"]?>"><i class="fa fa-trash"></i></a><a class="btn btn-success main-btn" href="edit_result.php?id=<?php echo $list["id"]?>">E</a></td>
                                </tr>
                        <?php

                                $i++;
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </main>
        <?php

        include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
<?php
}

?>