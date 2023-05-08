<?php 
include('db.php');
session_start();

if (isset($_POST["account"]) && isset($_POST["password"])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $account=validate($_POST["account"]);
    $password=validate($_POST["password"]);
    if(empty($account)){
        header("Location:index.php?error=account is required");
        exit();
    }elseif(empty($password)){
        header("Location:index.php?error=password is required");
        exit();
    }else{
        $sql = "SELECT * FROM admin_data WHERE admin_account=? AND admin_password=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$account,$password]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if($result["admin_account"]===$account && $result["admin_password"]===$password){
            $_SESSION["admin_account"] = $result["admin_account"];
            $_SESSION["admin_password"] = $result["admin_password"];
            $_SESSION["nickname"] = $result["nickname"];
            header("Location:adminLogin.php");
            exit();
        }else{
            header("Location:index.php?error=Incorrect account or password.");
            exit();
        }
    }
}else{
    header("Location:index.php");
    exit();
}
    