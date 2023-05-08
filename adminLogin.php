<?php 
session_start();
if(isset($_SESSION["admin_account"]) && isset($_SESSION["admin_password"])){
 include("read.php") ;
 $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
 if($page<1){
  header("Location:?page=1");
  exit();
}
$dataPerPage=10;
$allData=[];
$sql = sprintf(
  "SELECT * FROM basic_data ORDER BY employee_id DESC LIMIT %s, %s",
  ($page - 1) * $dataPerPage,
  $dataPerPage
);
$totalSql="SELECT COUNT(1) FROM basic_data";
$totalDataCount = $conn->query($totalSql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalDataCount / $dataPerPage);
$rows = $conn->query($sql)->fetchAll();
  include('./parts/head.php');
 ?>   

  <body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="h-1/6 bg-cyan-100 flex flex-col p-2">
        <nav class="self-end">
        <a href="createPage.php" class="text-xl text-cyan-900 no-underline  m-2">新增資料</a>
        <form id="sort-form" action="adminLogin.php" method="get" class="inline">
        <select id="sort-btn"  class="text-xl bg-cyan-100 m-2 outline-0" onchange="sortData()">
            <option name="sort">依名稱排序</option>
            <option name="sort">依薪水排序</option>
            <option name="sort">依年齡排序</option>
          </select>
        </form>
         
          <button class="text-xl text-cyan-900 m-2" id="search-btn" onclick="openModal('s')">查詢方式</button>
          <button class="text-xl text-cyan-900 m-2">夜間模式</button>
            <a href="logout.php" class="text-xl text-cyan-900 no-underline  m-2">登出</a>
          </nav>
      
        <h1 class=" text-6xl text-cyan-900 self-center">Hi <?php echo $_SESSION["nickname"];?></h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
        <table class="border-collapse border border border-gray-300">
          <thead>
            <tr>
            <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工編號</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工照片</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工名稱</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工生日</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工年齡</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工性別</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工電話</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工地址</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工到職日</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工在職狀態</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工電子郵件</th>
             <th class="text-cyan-900 p-2 text-lg bg-cyan-50">刪除資料</th>
             <th class="text-cyan-900 p-2 text-lg bg-cyan-50">修改資料</th>
            </tr>
          </thead>
        <tbody>
          <?php foreach ($rows as $r) : ?>
          <tr>
          <td class="p-2"><?=$r["employee_id"]?></td>
      <td class="p-2"><?=$r["employee_photo"] ?></td>
      <td class="p-2"><?=$r["employee_name"]?></td>
      <td class="p-2"><?=$r["employee_birthday"]?></td>
      <td class="p-2"><?=$r["employee_age"]?></td>
      <td class="p-2"><?=$r["employee_gender"]?></td>
      <td class="p-2"><?=$r["employee_phone"]?></td>
      <td class="p-2"><?=$r["employee_address"]?></td>
      <td class="p-2"><?=$r["employee_onboard_date"]?></td>
      <td class="p-2"><?php if($r["employee_still_onboard"]===1) {echo '仍在職';}else{echo '已離職';} ?></td>
      <td class="p-2"><?=$r["employee_email"]?></td>
      <td class="p-2 text-center"><a href="delete.php?employee_id=<?= $r['employee_id'] ?>" onclick="return confirm('確定要刪除該筆資料嗎?')">🗑️</a></td>
      <td class="p-2 text-center"><a href="editPage.php?employee_id=<?= $r['employee_id']?>">&#x270E;</a></td>
      
      
          </tr>
          <?php endforeach ?>
        </tbody>
        </table>
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
    <dialog id="search-modal" class="releative w-1/3 h-2/3 shadow-md shadow-cyan-700">
      <button class="absolute text-xl text-cyan-900 right-2 top-1" onclick="closeModal()">關閉</button>
    
    </dialog>
   
    <script>
      let searchDialog = document.getElementById("search-modal");
      let sortButton = document.getElementById("sort-btn");
      let sortForm = document.getElementById("sort-form");
      function openModal(){
            searchDialog.showModal();
      }
     function closeModal(){
            searchDialog.close();
     } 
     function sortData(){
      let option =sortButton.value;
      sortForm.submit();
     }
    </script>
  </body>
</html>
<?php
 }else{
    header("Location:index.php");
    exit();
}
 ?>