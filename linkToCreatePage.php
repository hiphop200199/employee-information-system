<?php 
include('db.php');
session_start();

if (isset($_GET["create-type"]) && isset($_GET["emp-id"])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $type=validate($_GET["create-type"]);
    $emp_id=validate($_GET["emp-id"]);
    if(empty($_GET['create-type'])){
        header("Location:adminLogin.php");
    }else{
        header('Location:createPage.php?create-type='.$type.'&emp-id='.$emp_id);
    }
}    

