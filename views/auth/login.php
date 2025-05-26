<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-cover bg-center" 
      style="background-image: url('../../../Assets/images/');">
      <?php if (isset($_SESSION['error'])): ?>
    <div class="flex items-center p-3 text-red-600 bg-red-100 rounded-md">
        <i class="fas fa-exclamation-circle mr-2"></i>
        <span><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
    </div>
    <?php endif; ?>
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
        <div class="text-center">
            <img src="../../../Assets/images/logo.jpg" alt="Cafe Logo" class="w-24 mx-auto">
            <h2 class="text-2xl font-semibold mt-4">Welcome to Cafe Shop</h2>
            <p class="text-gray-600">Login to your account to continue</p>
        </div>

        <!-- Error Message -->
        <?php if (isset($error) && !empty($error)): ?>
            <div class="flex items-center p-3 text-red-600 bg-red-100 rounded-md">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span><?php echo $error; ?></span>
            </div>
        <?php endif; ?>


        <form action="/auth/login" method="post" class="space-y-4">
            <div>
                <label for="email" class="block font-medium">Email</label>
                <div class="relative mt-1">
                    <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                        class="w-full px-5 py-2 border rounded-md pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label for="password" class="block font-medium">Password</label>
                <div class="relative mt-1">
                    <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required 
                        class="w-full px-10 py-2 border rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button" id="togglePassword" class="absolute right-3 top-3 text-gray-500">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center text-sm mt-3">
                <a href="/Views/auth/forword_password.php" class="text-blue-500 hover:underline pl-4 ml-64">Forgot Password?</a>
            </div>
            <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Login
            </button>
        </form>

        <div class="text-center text-gray-600">
            <p>Don't have an account? <a href="/Views/auth/register.php" class="text-blue-500 hover:underline">Register</a></p>
        </div>
    </div>

    <!-- JavaScript for Password Toggle -->
    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
            let passwordInput = document.getElementById("password");
            let icon = this.querySelector("i");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        });
    </script>

</body>
</html>
