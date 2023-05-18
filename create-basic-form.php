<h2 class=" text-4xl text-cyan-900">基本資料</h2>
      <form action="create.php" method="post" class="flex flex-col items-center h-fit p-2">
     
            <label class="text-lg m-1">名稱:<input type="text" name="name" value="" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" required/></label>
            <label class="text-lg m-1">電話:<input type="text" name="phone" value="" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" pattern="^09\d{8}$" required/></label>
            <label class="text-lg m-1">到職日:<input type="date" name="onboard-date" value="" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" required/></label>
            <label class="text-lg m-1">在職狀態:<input type="radio" name="status" value="1" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1"/><label class="text-lg m-1">仍在職</label><input type="radio" name="status" value="0" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" /><label class="text-lg m-1">已離職</label></label>
            <label class="text-lg m-1">信箱:<input type="text" name="email" value="" class="text-lg border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900 m-1" required/></label>
            <button type="submit" onclick="return confirm('確定要新增該筆資料嗎?')" name="create" class="text-lg rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900 m-1">新增</button>
            </form>