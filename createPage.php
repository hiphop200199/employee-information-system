<?php 
session_start();
$create_type = $_GET['create-type'];
$employee_id = isset($_GET['emp-id'])?$_GET['emp-id']:0;
$work_exp_amount;
  include('./parts/head.php');
 ?>   

  <body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="bg-cyan-100 flex flex-col p-2 h-1/6">
        <nav class="self-end">
          <?php if($create_type=='work-exp')include('work-exp-amount-input.php'); ?>
            <a href="adminLogin.php" class="text-xl text-cyan-900 no-underline  m-2">回到首頁</a>
            <a href="logout.php" class="text-xl text-cyan-900 no-underline  m-2">登出</a>
          </nav>
      
        <h1 class=" text-6xl text-cyan-900 self-center">新增資料</h1>
      </header>
      <main class="flex flex-col justify-center items-center">
       
      <?php if($create_type=='basic'){
        include('create-basic-form.php'); 
      }else{
        include('create-work-form.php');
      }
      ?>
            
      </main>
    </div>
   
   <script>
    let workArea =document.getElementById("work-experience-area");
    let workAmount = document.getElementById("work-exp-amount");
    if(workAmount!==null){

      workAmount.addEventListener("input",function(e){
      let button = '<button type="submit" class="block text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900" > 新增 </button>';
      let content='';
      let amount = parseInt(e.target.value);
      let data = `<div  class="flex  p-3 m-5">
                              <label class="text-lg m-1">公司名稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="company_name" type="text"  value=""></label>
                              <label class="text-lg m-1">起始日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="start_from" type="date"  value=""></label>
                              <label class="text-lg m-1">結束日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="ended_at" type="date"  value=""></label>
                              <label class="text-lg m-1">工作職稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="job_title" type="text"  value=""></label>
                              <label class="text-lg m-1">工作薪水:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="salary" type="number" min="0"  value=""></label>
                              <label class="text-lg m-1">離職原因:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="reason_for_leaving" type="text"  value=""></label>
                              </div>`
      for(let i=0;i<amount;i++){
        content+=data;
      }
      workArea.innerHTML=content+button;
    })

    }
    
   </script>
        
           
  
   
  </body>
</html>
