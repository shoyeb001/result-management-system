<?php
session_start();


if (!isset($_SESSION["email"])) {
    echo "<script>window.open('../index.php','_self')</script>";

}else{
include("../database/database.php");
$obj = new query();
 


$data = $obj->getdata("*","admin","","","","");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Subject</title>
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
                <h1 class="mt-4">Subject</h1>
                <a class="btn btn-primary" href="add_subject.php">Add Subject</a>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i= 1;
                        
                        if (sizeof($data)==0) {
                            echo "No Admin Found";
                        }else{
                            foreach($data as $list){                                
                        
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $list["email"] ?></td>
                            <td><?php echo $list["password"] ?></td>
                            <td><?php echo $list["name"] ?></td>
                            <td><a class="btn btn-success main-btn" href="edit_admin.php?id=<?php echo $list["id"]?>">Edit</a></td>
                        </tr>
                        <?php

                        $i ++;
                        
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