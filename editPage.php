<?php
include("db.php") ;
session_start();

$employee_id = isset($_GET['employee_id']) ? intval($_GET['employee_id']) : 0;

if(empty($employee_id)){
  header('Location: index.php');
  exit;
}
$sql = "SELECT * FROM basic_data INNER JOIN work_experience ON basic_data.employee_id = work_experience.employee_id WHERE basic_data.employee_id =".$employee_id;

$search_result = $conn->query($sql)->fetch();
if(empty($search_result)){
  // 透過編號找不到資料的話
  header('Location: index.php');
  exit;
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
    <main class="flex justify-center items-center">
      
    <form  action="edit.php" class="w-1/3 h-2/3 flex flex-col justify-around items-center" onsubmit="return confirm('確認修改資料?'); " method="post">
    <input type="hidden" name="employee_id" value="<?= $search_result['employee_id'] ?>">
    <h2 class="text-2xl text-cyan-900 self-center">基本資料</h2>
    <label class="text-lg m-1">員工名稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="name" type="text"  value="<?= $search_result["employee_name"] ?>"></label>
    <label class="text-lg m-1">員工電話:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="phone" type="text"  value="<?= $search_result["employee_phone"] ?>"></label>
    <label class="text-lg m-1">員工到職日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="onboard_date" type="date"  value="<?= $search_result["employee_onboard_date"] ?>"></label>
    <label class="text-lg m-1">員工在職狀態:<input type="radio" name="status" value="1" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" <?php if(isset($search_result['employee_still_onboard']) && $search_result['employee_still_onboard']==1){echo 'checked';} ?>/><label class="text-lg m-1">仍在職</label><input type="radio" name="status" value="0" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" <?php if(isset($search_result['employee_still_onboard']) && $search_result['employee_still_onboard']==0){echo 'checked';} ?>/><label class="text-lg m-1">已離職</label></label>
    <label class="text-lg m-1">員工信箱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="email" type="text"  value="<?= $search_result["employee_email"] ?>"></label>
    <h2 class="text-2xl text-cyan-900 self-center">工作經驗</h2>
    <label class="text-lg m-1">公司名稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="company_name" type="text"  value="<?= $search_result["company_name"] ?>"></label>
    <label class="text-lg m-1">起始日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="start_from" type="date"  value="<?= $search_result["start_from"] ?>"></label>
    <label class="text-lg m-1">結束日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="ended_at" type="date"  value="<?= $search_result["ended_at"] ?>"></label>
    <label class="text-lg m-1">工作職稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="job_title" type="text"  value="<?= $search_result["job_title"] ?>"></label>
    <label class="text-lg m-1">工作薪水:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="salary" type="number" min="0"  value="<?= $search_result["salary"] ?>"></label>
    <label class="text-lg m-1">離職原因:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="reason_for_leaving" type="text"  value="<?= $search_result["reason_for_leaving"] ?>"></label>
    <button type="submit" class="text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900" > 提交 </button>
</form>
  
  </main>
  </body>
</html>
