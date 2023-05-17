

<h2 class="text-4xl text-cyan-900 self-center m-2">工作經驗</h2>

    <section id="work-experiences" class="flex flex-col justify-center items-center">
      <?php foreach ($search_work_experience_result as $we) : ?>
        <form  action="edit.php" class="flex  justify-center items-center border-2 border-cyan-900 flex-col  p-3 m-5" onsubmit="return confirm('確認修改資料?'); " method="post">
<input type="hidden" name="employee_id" value="<?= $employee_id ?>">
      <div id="<?= $we['work_exp_id'] ?>" class="flex  p-3 m-5">
      <input type="hidden" name="work_exp_id" value="<?= $we['work_exp_id'] ?>">
        <label class="text-lg m-1">公司名稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="company_name" type="text"  value="<?= $we["company_name"] ?>"></label>
        <label class="text-lg m-1">起始日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="start_from" type="date"  value="<?= $we["start_from"] ?>"></label>
        <label class="text-lg m-1">結束日期:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="ended_at" type="date"  value="<?= $we["ended_at"] ?>"></label>
        <label class="text-lg m-1">工作職稱:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="job_title" type="text"  value="<?= $we["job_title"] ?>"></label>
        <label class="text-lg m-1">工作薪水:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="salary" type="number" min="0"  value="<?= $we["salary"] ?>"></label>
        <label class="text-lg m-1">離職原因:<input id="name" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" name="reason_for_leaving" type="text"  value="<?= $we["reason_for_leaving"] ?>"></label>
        </div>
        <button type="submit" class="block text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900" > 修改 </button>
        </form>
     <?php endforeach ?> 
    </section>
   