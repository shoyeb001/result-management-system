<?php

session_start();


include("database/database.php");
$obj = new query();

$email = $obj->get_safe_str($_POST['email']);
$password = $obj->get_safe_str($_POST['password']);

$cond = array("email"=>$email,"password"=>$password);

$data = $obj->getdata("*","admin",$cond,"","","");


if (sizeof($data)==0) {
    echo"fail";
}else{

    $_SESSION["email"] = "true";
    echo "true";

}


?>