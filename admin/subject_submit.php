<?php
use function PHPSTORM_META\type;
session_start();


if (!isset($_SESSION["email"])) {
    echo "<script>window.open('../index.php','_self')</script>";

}else{


include("../database/database.php");


$subject = $_POST['subject'];
$total = $_POST['total_marks'];

$obj = new query();
$condition_arr = array("name"=>$subject);

$data = $obj->getdata("*","subjects",$condition_arr,"","","");


if(sizeof($data)==0){
    $item_array = array("name"=>$subject,"total_marks"=>$total);

    $obj->insert("subjects", $item_array);

    echo "Subject Inserted Successfully";
}else{
    echo "Subject Already Exits";
}
}

?>