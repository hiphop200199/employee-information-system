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
    $phone=validate($_POST["phone"]);
    $onboard_date = validate($_POST["onboard-date"]);
    $status = validate($_POST["status"]);
    $email = validate($_POST["email"]);


   
        $sql="INSERT INTO basic_data(employee_name,employee_phone,employee_onboard_date,employee_still_onboard,employee_email) VALUES(?,?,?,?,?) ";
        $statement = $conn->prepare($sql);
        $statement->execute([$name,$phone,$onboard_date,$status,$email]);
        $sql_get_employee_id = "SELECT employee_id FROM basic_data ORDER BY employee_id DESC LIMIT 1;";
        $search_id_result = $conn->query($sql_get_employee_id)->fetch();
        $sql_create_work = "INSERT INTO work_experience(employee_id) VALUES(?)";
        $statement_create_work = $conn->prepare($sql_create_work);
        $statement_create_work->execute([$search_id_result['employee_id']]);
  
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