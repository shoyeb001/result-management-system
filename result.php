<?php
session_start();

if (!isset($_SESSION["id"])) {
    echo "<script>window.open('index.php','_self')</script>";
}else{

$id = $_SESSION["id"];

include("database/database.php");
$obj = new query();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

    <title>Show Student Results</title>
</head>

<body>
    <?php
    include("header.php")
    ?>
    <div class="result">
        <div class="result-container container">
            <h2>West Bengal Board Result</h2>
            <div class="row">
                <div class="col-4">
                    <img src="img/aa959e383f643af76d19d4d883f4a563-removebg-preview.png">
                </div>
                <div class="col-4">
                    <h4>Academic Report</h4>
                    <h4>Session 2021-2022</h4>
                    <h4>High Secondary Result</h4>
                </div>
                <?php
                $cond = array("id"=>$id);
                $result = $obj->getdata("*","student",$cond,"","","");
                
                ?>
                <div class="col-4">
                    <img src="img/<?php echo $result[0]["image"]?>">
                </div>
            </div>
            <div class="row second">
                <div class="col-6">
                    <h5>Name : <?php echo $result[0]["name"]?></h5>
                    <h5>Gurdian Name: <?php echo $result[0]["gname"]?></h5>
                    <h5>Address : <?php echo $result[0]["address"]?></h5>
                </div>
                <div class="col-6">
                    <h5>Roll No : <?php echo $result[0]["roll_no"]?></h5>
                    <h5>D.O.B : <?php echo $result[0]["dob"]?></h5>
                </div>
            </div>
            <div class="third container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Subjects</th>
                            <th scope="col">Total Marks</th>
                            <th scope="col">Obtain Marks</th>
                            <th scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $result[0]["subject1"]?></th>
                            <td>100</td>
                            <td><?php echo $result[0]["marks1"]?></td>
                            <td><?php echo $obj->grade($result[0]["marks1"])?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $result[0]["subject2"]?></th>
                            <td>100</td>
                            <td><?php echo $result[0]["marks2"]?></td>
                            <td><?php echo $obj->grade($result[0]["marks2"])?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $result[0]["subject3"]?></th>
                            <td>100</td>
                            <td><?php echo $result[0]["marks3"]?></td>
                            <td><?php echo $obj->grade($result[0]["marks3"])?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $result[0]["subject4"]?></th>
                            <td>100</td>
                            <td><?php echo $result[0]["marks4"]?></td>
                            <td><?php echo $obj->grade($result[0]["marks4"])?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $result[0]["subject5"]?></th>
                            <td>100</td>
                            <td><?php echo $result[0]["marks5"]?></td>
                            <td><?php echo $obj->grade($result[0]["marks5"])?></td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td>600</td>
                            <td><?php $total =  $result[0]['marks1'] + $result[0]['marks2'] + $result[0]['marks3'] + $result[0]['marks4'] + $result[0]['marks5'] ?>
                            <?php echo $total?>
                        
                        </td>
                            <td><?php echo ($total/500)*100.."%"?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="download"><a class="btn btn-primary" href="download_result.php"><i class="fa fa-download"></i></a></div>
    <?php
    include("footer.php");

    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="js/script.js"></script>


</body>

</html>
<?php


}
?>