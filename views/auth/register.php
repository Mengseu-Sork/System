
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-cover bg-center" 
      style="background-image: url('../../../Assets/images/photo_2025-03-12_07-22-11.jpg');">
    
    <div class="w-full max-w-md p-5 space-y-6 bg-white shadow-md rounded-lg">
        <div class="text-center">
            <img src="../../../Assets/images/logo.jpg" alt="XING FU CHA Logo" class="w-24 mx-auto">
            <h2 class="text-2xl font-semibold mt-4">Create an Account</h2>
        </div>

        <!-- Error or Success Message -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="flex items-center p-3 text-red-600 bg-red-100 rounded-md">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
            </div>
        <?php elseif (isset($_SESSION['success'])): ?>
            <div class="flex items-center p-3 text-green-600 bg-green-100 rounded-md">
                <i class="fas fa-check-circle mr-2"></i>
                <span><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
            </div>
        <?php endif; ?>

        <!-- Registration Form -->
        <form action="/auth/register" method="post" class="space-y-4">
            <div class="flex justify-between gap-5">
                <div class="flex-1">
                    <label for="first_name" class="block font-medium mb-1">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required 
                        class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex-1">
                    <label for="last_name" class="block font-medium mb-1">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required 
                        class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="flex justify-between gap-5">
                <div class="flex-1">
                    <label for="email" class="block font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                        class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex-1">
                    <label for="phone" class="block font-medium mb-1">Phone</label>
                    <input type="phone" id="phone" name="phone_number" placeholder="Enter your phone" required 
                        class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="flex justify-between gap-5">
                <div class="flex-1">
                    <label for="password" class="block font-medium mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required 
                        class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Confirm Password -->
                <div class="flex-1">
                    <label for="confirm_password" class="block font-medium mb-1">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required 
                        class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Register
            </button>
        </form>

        <!-- Login Link -->
        <div class="text-center text-gray-600">
            <p>Already have an account? <a href="../auth/login.php" class="text-blue-500 hover:underline">Login</a></p>
        </div>
    </div>

</body>
</html>
