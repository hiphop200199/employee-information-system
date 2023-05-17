<?php
include("db.php") ;
session_start();

$employee_id = isset($_GET['emp-id']) ? intval($_GET['emp-id']) : 0;

if(empty($employee_id)){
  header('Location: index.php');
  exit;
}
if($_GET['update-type']=='basic'){
  $sql_basic = "SELECT * FROM basic_data WHERE employee_id =".$employee_id;
  $search_basic_data_result = $conn->query($sql_basic)->fetch();
  if(empty($search_basic_data_result)){
    // 透過編號找不到資料的話
    header('Location: index.php');
    exit;
  }





}else{
  $sql_work_experiences = "SELECT * FROM work_experience WHERE employee_id =".$employee_id;
  $search_work_experience_result = $conn->query($sql_work_experiences)->fetchAll();
  if(empty($search_work_experience_result)){
    // 透過編號找不到資料的話
    header('Location: index.php');
    exit;
  }
}






 include("./parts/head.php"); ?>
<body class="p-0 m-0 box-border">
    
<header class="h-1/6 bg-cyan-100 flex flex-col p-2">
        <nav class="self-end">
        <a href="adminLogin.php" class="text-xl text-cyan-900 no-underline  m-2">回到首頁</a>
            <a href="logout.php" class="text-xl text-cyan-900 no-underline  m-2">登出</a>
          </nav>
      
        <h1 class=" text-6xl text-cyan-900 self-center">資料修改</h1>
      </header>
    <main class="flex justify-center flex-col items-center">
       
    <?php if($_GET['update-type']=='basic'){
        include('basicDataEdit.php');
    }else{
        include('workExperienceEdit.php');
    }
    ?>
  
  </main>
  </body>
</html>
