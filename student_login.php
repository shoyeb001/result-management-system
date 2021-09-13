<?php
session_start();

include("database/database.php");
$obj = new query();

$roll_no = $obj->get_safe_str($_POST['roll_no']);
$dob = $obj->get_safe_str($_POST['dob']);

$cond = array("roll_no"=>$roll_no,"dob"=>$dob);

$data = $obj->getdata("*","student",$cond,"","","");


if (sizeof($data)==0) {
    echo"fail";
}else{

    $_SESSION["id"] = $data[0]["id"];
    echo "yes";

}



?>