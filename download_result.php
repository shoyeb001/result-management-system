<?php

session_start();

if (!isset($_SESSION["id"])) {
    echo "<script>window.open('index.php','_self')</script>";
}else{

require('vendor/autoload.php');
include("database/database.php");

$obj = new query();
$id = $_SESSION["id"];
$cond = array("id"=>$id);
 $result = $obj->getdata("*","student",$cond,"","","");

$html = '<style>        
    
.result-container {
    width: 100%;
    height: 700px;
    background: #fff;
}

 .result-container h2 {
    font-weight: 700;
    text-align: center;
    font-size: 30px;
}

 .result-container .row .col-4 img {
    width: 200px;
    height: 134px;
}

 .result-container .row .col-4 h4 {
    text-align: center;
    font-size: 18px;
}

 .result-container .row .col-4 h4:first-child {
    margin-top: 15px;
}

 .result-container .second {
    margin-top: 12px;
}
.result-container .second .col-6 {
    width: 50%;
    float:left;
}
 .result-container .second .col-6 h5 {
    font-size: 17px;
    margin-top:0px;
}
.result-container .second .col-6 h5:last-child{
    text-align:right;
}

 .result-container .third {
    width: 967px;
    margin: auto;
    margin-top: 20px;
}

.download {
    position: fixed;
    top: 300px;
    right: 0;
}

.download .btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: red;
    border: none;
}
.result-container .col-4{
     width: 33.33333333%;
     float:left;
}
.result-container .row{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.table tr{
    border-width: 1px 0;
    border-color: black;
    border-style: solid;
}
.table th{
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
}
.table{
    width:700px;
}
</style>';

$html.='<div class="result-container mia">
<h2>West Bengal Board Result</h2>
<div class="row sunny">
    <div class="col-4">
        <img src="img/aa959e383f643af76d19d4d883f4a563-removebg-preview.png" width="200px">
    </div>
    <div class="col-4">
        <h4>Academic Report</h4>
        <h4>Session 2021-2022</h4>
        <h4>High Secondary Result</h4>
    </div>';
$html.= '<div class="col-4">
<img src="img/'.$result[0]["image"].'" width="200px" style="float:right">
</div></div>';
$html.='<div class="row second">
<div class="col-6">
    <h5>Name :'. $result[0]["name"].'</h5>
    <h5>Gurdian Name: '. $result[0]["gname"].'</h5>
    <h5>Address : '. $result[0]["address"].'</h5>
</div>';
$html.=' <div class="col-6">
<h5 style="text-align:right">Roll No :' .$result[0]["roll_no"].'</h5>
<h5 style="text-align:right">D.O.B :'. $result[0]["dob"].'</h5>
</div>';
$html.='<div class="third">
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
            <th scope="row">'. $result[0]["subject1"] .'</th>
            <td>100</td>
            <td>'. $result[0]["marks1"] .'</td>
            <td>'. $obj->grade($result[0]["marks1"]) .'</td>
        </tr>
        <tr>
            <th scope="row">'. $result[0]["subject2"] .'</th>
            <td>100</td>
            <td>'. $result[0]["marks2"] .'</td>
            <td>'. $obj->grade($result[0]["marks2"]) .'</td>
        </tr>
        <tr>
            <th scope="row">'. $result[0]["subject3"] .'</th>
            <td>100</td>
            <td>'. $result[0]["marks3"].'</td>
            <td>'. $obj->grade($result[0]["marks3"]).'</td>
        </tr>
        <tr>
            <th scope="row">'. $result[0]["subject4"].'</th>
            <td>100</td>
            <td>'. $result[0]["marks4"] .'</td>
            <td>'. $obj->grade($result[0]["marks4"]) .'</td>
        </tr>
        <tr>
            <th scope="row">'. $result[0]["subject5"] .'</th>
            <td>100</td>
            <td>'. $result[0]["marks5"] .'</td>
            <td>'. $obj->grade($result[0]["marks5"]) .'</td>
        </tr>
        <tr>
            <th scope="row">Total</th>
            <td>600</td>';
            
            
            $total =  $result[0]['marks1'] + $result[0]['marks2'] + $result[0]['marks3'] + $result[0]['marks4'] + $result[0]['marks5'];

           $html.=   '<td>'. $total .'</td>

            </td>
            <td>'.($total / 500) * 100..' % </td>
        </tr>
    </tbody>
</table>';


$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = "result.pdf";
$mpdf->output($file,'D');
//D
//I
//F
//S

}
?>