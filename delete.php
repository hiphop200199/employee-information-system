<?php

include("db.php") ;

$employee_id = isset($_GET['employee_id']) ? intval($_GET['employee_id']) : 0;



$sql = "DELETE FROM basic_data WHERE employee_id=$employee_id";
$conn->exec($sql);
$conn = null;

?>



<?php include("./parts/head.php"); ?>
  <body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="h-1/6 bg-cyan-100 grid p-2">
       <h1 class=" text-6xl text-cyan-900 place-self-center"><?php echo "刪除資料成功!";?></h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
      
      <a class="  text-6xl text-cyan-900 self-center no-underline"  href="adminLogin.php">首頁</a>
        
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
  </body>
</html>