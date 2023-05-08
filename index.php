<?php 
include('./parts/head.php');
?>
  <body class="p-0 m-0 box-border">
    <div class="w-full h-screen">
      <header class="h-1/6 bg-cyan-100 flex">
        <h1 class="text-6xl text-cyan-900 mx-auto my-auto">
          Employee Information System
        </h1>
      </header>
      <main class="h-4/6 flex justify-center items-center">
        <form
          action="login.php"
          method="post"
          class="w-1/3 h-2/3 flex flex-col justify-around items-center"
        >
        <?php if(isset($_GET["error"])){ ?>
            <p class="text-xl text-red-500"><?=$_GET["error"] ?></p>
            <?php } ?>
          <input
            type="text"
            name="account"
            placeholder="account"
            class="text-xl border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900"
          />
          <input
            type="password"
            name="password"
            placeholder="password"
            class="text-xl border-2 border-gray-300 p-2 rounded-sm outline-2 outline-cyan-900"
          />
          <button
            type="submit"
            class="text-xl rounded-sm border-2 border-gray-300 bg-cyan-100 p-2 text-cyan-900"
          >
            Login
          </button>
        </form>
      </main>
      <footer class="h-1/6 bg-cyan-100"></footer>
    </div>
  </body>
</html>
