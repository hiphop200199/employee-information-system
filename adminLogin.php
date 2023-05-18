<?php 
session_start();
if(isset($_SESSION["admin_account"]) && isset($_SESSION["admin_password"])){
 include("db.php") ;
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
        <button id="create-btn" class="text-xl text-cyan-900 m-2" onclick="openModal('c')">新增資料</button>
        <button id="update-btn" class="text-xl text-cyan-900 m-2" onclick="openModal('u')">資料修改</button>
        <!--<form id="sort-form" action="adminLogin.php" method="get" class="inline">
        <select id="sort-btn"  class="text-xl bg-cyan-100 m-2 outline-0" onchange="sortData()">
            <option name="sort">依名稱排序</option>
            <option name="sort">依薪水排序</option>
            <option name="sort">依年齡排序</option>
          </select>
        </form>-->
         
          <!--<button class="text-xl text-cyan-900 m-2" id="search-btn" onclick="openModal('s')">查詢方式</button>
          <button class="text-xl text-cyan-900 m-2">夜間模式</button>-->
            <a href="logout.php" class="text-xl text-cyan-900 no-underline  m-2">登出</a>
          </nav>
      
        <h1 class=" text-6xl text-cyan-900 self-center">Hi <?php echo $_SESSION["nickname"];?></h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
        <table class="border-collapse border border border-gray-300">
          <thead>
            <tr>
            <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工編號</th>
              <!--<th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工照片</th>-->
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工名稱</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工電話</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工到職日</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工在職狀態</th>
              <th class="text-cyan-900 p-2 text-lg bg-cyan-50">員工電子郵件</th>
             <th class="text-cyan-900 p-2 text-lg bg-cyan-50">刪除資料</th>
             <!--<th class="text-cyan-900 p-2 text-lg bg-cyan-50">修改資料</th>-->
            </tr>
          </thead>
        <tbody>
          <?php foreach ($rows as $r) : ?>
          <tr>
          <td class="p-2"><?=$r["employee_id"]?></td>
      <!--<td class="p-2"><?=$r["employee_photo"] ?></td>-->
      <td class="p-2"><?=$r["employee_name"]?></td>
      <td class="p-2"><?=$r["employee_phone"]?></td>
      <td class="p-2"><?=$r["employee_onboard_date"]?></td>
      <td class="p-2"><?php if($r["employee_still_onboard"]===1) {echo '仍在職';}else{echo '已離職';} ?></td>
      <td class="p-2"><?=$r["employee_email"]?></td>
      <td class="p-2 text-center"><a href="delete.php?employee_id=<?= $r['employee_id'] ?>" onclick="return confirm('確定要刪除該筆資料嗎?')">🗑️</a></td>
      <!--<td class="p-2 text-center"><a href="editPage.php?employee_id=<?= $r['employee_id']?>">&#x270E;</a></td>-->
      
      
          </tr>
          <?php endforeach ?>
        </tbody>
        </table>
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
    <!--<dialog id="search-modal" class="releative w-1/3 h-2/3 shadow-md shadow-cyan-700">
      <button class="absolute text-xl text-cyan-900 right-2 top-1" onclick="closeModal()">關閉</button>
      <button>所有員工基本資料</button>
      <input type="text" name="" id="" list="">
      <datalist id="employees">
        <?php  foreach ($rows as $r):  ?>
        <option value="<?php $r['employee_name'] ?>"></option>
       <?php endforeach ?>
      </datalist>
      <button>個別員工工作經驗</button>

    </dialog>-->
    <dialog id="create-modal" class="releative w-1/3 h-1/3 shadow-md shadow-cyan-700">
              <h2 class="text-3xl text-cyan-900 text-center my-2">請輸入資料類型、員工編號</h2>
              <h3 class="text-2xl text-cyan-900 text-center my-2">新增工作經驗需要基本資料</h3>
              <form action="linkToCreatePage.php" method="get" class="flex justify-center items-center flex-col">
                <section>
              <label class="text-lg m-2">基本資料<input type="radio" value="basic" name="create-type" id="basic-radio" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-2"/></label>
              <label class="text-lg m-2">工作經驗<input type="radio" value="work-exp" name="create-type" id="work-exp-radio" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-2"/></label>
              </section>
             
              <label class="text-lg m-2">員工編號:<input type="number" min="1" name="emp-id" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-2" id="emp-id-input"/></label>
             
              <section class="flex justify-center my-2">
              <button type="submit" class="text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900 m-2">提交</button>
              <button type="button" class="text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900 m-2" id="cancel-create" onclick="closeModal('c')">取消</button>
              </section>
              </form>
          </dialog>
          <dialog id="update-modal" class="releative w-1/3 h-1/3 shadow-md shadow-cyan-700">
              <h2 class="text-3xl text-cyan-900 text-center my-2">請輸入資料類型、員工編號</h2>
              <form action="linkToEditPage.php" method="get" class="flex justify-center items-center flex-col">
                <section>
              <label class="text-lg m-2">基本資料<input type="radio" value="basic" name="update-type" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-2"/></label>
              <label class="text-lg m-2">工作經驗<input type="radio" value="work-exp" name="update-type" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-2"/></label>
              </section>
             
              <label class="text-lg m-2">員工編號:<input type="number" min="1" name="emp-id" required class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-2"/></label>
             
              <section class="flex justify-center my-2">
              <button type="submit" class="text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900 m-2">提交</button>
              <button type="button" class="text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900 m-2" id="cancel-update" onclick="closeModal('u')">取消</button>
              </section>
              </form>
          </dialog>
    <script>
      //let searchDialog = document.getElementById("search-modal");
      let createDialog =document.getElementById("create-modal");
      let createButton = document.getElementById("create-btn");
      let cancelCreate = document.getElementById("cancel-create");
      let updateDialog =document.getElementById("update-modal");
      let updateButton =document.getElementById("update-btn");
      let cancelUpdate =document.getElementById("cancel-update");
      let sortButton = document.getElementById("sort-btn");
      let sortForm = document.getElementById("sort-form");
      let basicOption = document.getElementById("basic-radio");
      let workExpOption =document.getElementById("work-exp-radio");
      let empIdInput =document.getElementById("emp-id-input");
      function openModal(type){
        switch(type){
          case 'c':
            createDialog.showModal();
            break;
          case 'u':
            updateDialog.showModal();
            break;  
        }
      }
     function closeModal(type){
      switch(type){
          case 'c':
            createDialog.close();
            break;
          case 'u':
            updateDialog.close();
            break;  
        }
     } 
     function sortData(){
      let option =sortButton.value;
      sortForm.submit();
     }
     workExpOption.addEventListener("input",()=>empIdInput.setAttribute("required",'true'))
     basicOption.addEventListener("input",()=>empIdInput.removeAttribute("required"));
    </script>
  </body>
</html>
<?php
 }else{
    header("Location:index.php");
    exit();
}
 ?>