<?php
if(isset($_POST["create"])){
    include("db.php") ;
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name=validate($_POST["name"]);
    $birthday=validate($_POST["birthday"]);
    $gender=validate($_POST["gender"]);
    $phone=validate($_POST["phone"]);
    $address=validate($_POST["address"]);
    $onboard_date = validate($_POST["onboard-date"]);
    $status = validate($_POST["status"]);
    $email = validate($_POST["email"]);
    $basic_data = "name=" . $name . "&birthday=" . $birthday . "&gender=" . $gender . "&phone=" . $phone . "&address=" . $address . "&onboard_date=" . $onboard_date."&status=".$status."&email=".$email;

    if(empty($name)){
        header("Location:./createPage.php?error=Name is required&$basic_data");
    }elseif(empty($birthday)){
        header("Location:./createPage.php?error=Birthday is required&$basic_data");
    }elseif(empty($gender)){
        header("Location:./createPage.php?error=Gender is required&$basic_data");
    }elseif(empty($phone)){
        header("Location:./createPage.php?error=Phone is required&$basic_data");
    }elseif(empty($address)){
        header("Location:./createPage.php?error=Address is required&$basic_data");
    }elseif(empty($onboard_date)){
        header("Location:./createPage.php?error=Onboard_date is required&$basic_data");
    } elseif (empty($status)) {
        header("Location:./createPage.php?error=Status is required&$basic_data");
    }elseif(empty($email)){
        header("Location:./createPage.php?error=Email is required&$basic_data");
    }else{
        $sql="INSERT INTO basic_data(employee_name,employee_birthday,employee_gender,employee_phone,employee_address,employee_onboard_date,employee_still_onboard,employee_email) VALUES(?,?,?,?,?,?,?,?) ";
        $statement = $conn->prepare($sql);
        $statement->execute([$name,$birthday,$gender,$phone,$address,$onboard_date,$status,$email]);
        
    }
}
?>
 <?php include("./parts/head.php"); ?>
<body>
<body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="h-1/6 bg-cyan-100 grid p-2">
       <h1 class=" text-6xl text-cyan-900 place-self-center"><?php echo "新增資料成功!";?></h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
      
      <a class="  text-6xl text-cyan-900 self-center no-underline"  href="adminLogin.php">首頁</a>
        
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
  </body>
</html>