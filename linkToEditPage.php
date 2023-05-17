<?php 
include('db.php');
session_start();

if (isset($_GET["update-type"]) && isset($_GET["emp-id"])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $type=validate($_GET["update-type"]);
    $emp_id=validate($_GET["emp-id"]);
    if(empty($_GET['update-type'])){
        header("Location:adminLogin.php");
    }else{
        header('Location:editPage.php?update-type='.$type.'&emp-id='.$emp_id);
    }
}    

