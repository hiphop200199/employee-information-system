<?php 
include("db.php") ;
$sql_basic = "UPDATE `basic_data` SET
`employee_name`=?,
`employee_phone`=?,
`employee_onboard_date`=?,
`employee_still_onboard`=?,
`employee_email`=?,
WHERE `employee_id`=?";
$sql_work="UPDATE `work_experience` SET
`company_name`=?,
`start_from`=?,
`ended_at`=?,
`job_title`=?,
`salary`=?,
`reason_for_leaving`,
WHERE `employee_id`=?";
$employee_id = intval($_POST["employee_id"]);
 $name=$_POST["name"];
 $phone=$_POST["phone"];
 $onboard_date=$_POST["onboard_date"];
 $still_onboard=$_POST["status"];
 $email =$_POST['email'];
 $company_name = $_POST['company_name'];
 $start_from = $_POST['start_from'];
 $ended_at = $_POST['ended_at'];
 $job_title = $_POST['job_title'];
 $salary = $_POST['salary'];
 $reason_for_leaving = $_POST['reason_for_leaving'];

$statement_basic = $conn->prepare($sql_basic);
$statement_basic->execute([
    $name,
    $phone,
    $onboard_date,
    $still_onboard,
    $email,
    $employee_id
  ]);
  $statement_work = $conn->prepare($sql_work);
$statement_work->execute([
    $company_name,
    $start_from ,
    $ended_at, 
    $job_title, 
    $salary, 
    $reason_for_leaving,
    $employee_id 
  ]);
  ?>
  <?php include("./parts/head.php"); ?>
  <body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="h-1/6 bg-cyan-100 grid p-2">
       <h1 class=" text-6xl text-cyan-900 place-self-center"><?php echo "修改資料成功!";?></h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
      
      <a class="  text-6xl text-cyan-900 self-center no-underline"  href="adminLogin.php">首頁</a>
        
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
  </body>
</html>