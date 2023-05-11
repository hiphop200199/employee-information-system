<?php 
session_start();

  include('./parts/head.php');
 ?>   

  <body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="bg-cyan-100 flex flex-col p-2 h-1/6">
        <nav class="self-end">
            <a href="adminLogin.php" class="text-xl text-cyan-900 no-underline  m-2">回到首頁</a>
            <a href="logout.php" class="text-xl text-cyan-900 no-underline  m-2">登出</a>
          </nav>
      
        <h1 class=" text-6xl text-cyan-900 self-center">Hi <?php echo $_SESSION["nickname"];?></h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
       
         
      <form action="create.php" method="post" class="flex flex-col items-center h-fit p-2">
      <?php if(isset($_GET["error"])) { ?>
<div class="text-lg   bg-red-400 p-2 text-cyan-50" > <?php echo $_GET["error"]; ?></div>
<?php } ?>
            <label class="text-lg m-1">名稱:<input type="text" name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1"/></label>
            <label class="text-lg m-1">電話:<input type="text" name="phone" value="<?php if(isset($_GET['phone'])){echo $_GET['phone'];}?>" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1"/></label>
            <label class="text-lg m-1">到職日:<input type="date" name="onboard-date" value="<?php if(isset($_GET['onboard_date'])){echo $_GET['onboard_date'];}?>" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1"/></label>
            <label class="text-lg m-1">在職狀態:<input type="radio" name="status" value="1" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" <?php if(isset($_GET['status']) && $_GET['status']==1){echo 'checked';} ?>/><label class="text-lg m-1">仍在職</label><input type="radio" name="status" value="0" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" <?php if(isset($_GET['status']) && $_GET['status']==0){echo 'checked';} ?>/><label class="text-lg m-1">已離職</label></label>
            <label class="text-lg m-1">信箱:<input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1"/></label>
            <button type="submit" onclick="return confirm('確定要新增該筆資料嗎?')" name="create" class="text-lg rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900 m-1">提交</button>
            </form>
      
      
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
   
   
        
           
  
   
  </body>
</html>
