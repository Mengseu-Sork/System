<?php require __DIR__.'/../layout/header.php'; ?>
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-6">
    <h1 class="text-9xl font-extrabold text-red-600 drop-shadow-lg">404</h1>
    <p class="text-2xl md:text-3xl text-gray-700 mt-4 font-semibold text-center">
        Oops! The page you're looking for doesn't exist.
    </p>
    <a href="/" 
       class="mt-6 px-8 py-3 bg-blue-500 text-white text-lg font-semibold rounded-lg shadow-lg 
              hover:bg-blue-600 transition duration-300 transform hover:scale-105">
        Go to Homepage
    </a>
</div>
<?php require __DIR__.'/../layout/footer.php'; ?>
