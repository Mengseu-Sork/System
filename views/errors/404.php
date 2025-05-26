<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 Not Found</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Cloud shape and animation */
    .cloud {
      width: 350px;
      height: 120px;
      background: #fff;
      border-radius: 100px;
      position: absolute;
      z-index: -1;
    }
    .cloud::before,
    .cloud::after {
      content: '';
      position: absolute;
      background: #fff;
      z-index: -1;
    }
    .cloud::after {
      width: 100px;
      height: 100px;
      top: -50px;
      left: 50px;
      border-radius: 100px;
    }
    .cloud::before {
      width: 180px;
      height: 180px;
      top: -90px;
      right: 50px;
      border-radius: 200px;
    }

    @keyframes moveclouds {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(1000px);
      }
    }

    .animate-clouds {
      animation: moveclouds linear infinite;
    }
  </style>
</head>
<body class="bg-[#33cc99] text-white font-sans max-h-[700px] overflow-hidden relative">

  <!-- Clouds -->
  <div id="clouds" class="relative">
    <div class="cloud animate-clouds top-[-50px] left-[100px] scale-[0.3] opacity-90" style="animation-duration: 15s;"></div>
    <div class="cloud animate-clouds top-[-80px] left-[250px] scale-[0.3]" style="animation-duration: 17s;"></div>
    <div class="cloud animate-clouds top-[30px] left-[250px] scale-[0.6] opacity-60" style="animation-duration: 25s;"></div>
    <div class="cloud animate-clouds bottom-[-70px] left-[250px] scale-[0.6] opacity-80" style="animation-duration: 25s;"></div>
    <div class="cloud animate-clouds bottom-[20px] left-[470px] scale-[0.75] opacity-75" style="animation-duration: 18s;"></div>
    <div class="cloud animate-clouds top-[300px] left-[200px] scale-[0.5] opacity-80" style="animation-duration: 20s;"></div>
  </div>

  <!-- Content -->
  <div class="w-[80%] mx-auto my-[100px] text-center relative">
    <div class="text-[220px] leading-none relative z-10 inline-block tracking-[15px] h-[250px]">404</div>
    <hr class="border-t-[5px] border-white w-[420px] h-[10px] mx-auto relative z-[-10]" />
    <div class="text-4xl tracking-[12px] leading-[0.8] mt-4">THE PAGE</div>
    <div class="text-[20px] mt-2">WAS NOT FOUND</div>
    <a href="/Dashboard" class="inline-block mt-6 px-6 py-2 text-[#33cc99] text-[25px] bg-white w-[358px] text-center">BACK TO DASHBOARD</a>
  </div>
</body>
</html>
