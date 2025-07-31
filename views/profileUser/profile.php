<?php
// Handle form submissions for file uploads
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Content-Type: application/json"); // Set response type to JSON

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "Assets/images/uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($fileType, $allowedTypes)) {
            echo json_encode(["success" => false, "message" => "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed."]);
            exit;
        }

        // Ensure target directory exists
        if (!is_dir($targetDir) && !mkdir($targetDir, 0777, true)) {
            echo json_encode(["success" => false, "message" => "Failed to create upload directory."]);
            exit;
        }

        // Move the uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            echo json_encode(["success" => true, "message" => "File uploaded successfully!", "image" => $targetFilePath]);
        } else {
            echo json_encode(["success" => false, "message" => "Error moving the uploaded file."]);
        }
    } else {
        // Handle specific upload errors
        $errorMessages = [
            UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the server limit.",
            UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the form limit.",
            UPLOAD_ERR_PARTIAL    => "The file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
            UPLOAD_ERR_EXTENSION  => "File upload stopped by a PHP extension."
        ];
        
        $errorCode = $_FILES["image"]["error"];
        $errorMessage = $errorMessages[$errorCode] ?? "An unknown error occurred.";

        echo json_encode(["success" => false, "message" => $errorMessage]);
    }
    exit;
}
?>

<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto custom-scroll">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
            <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
                <div class="shadow-lg bg-white rounded-lg p-6 mb-16 transition duration-300"
                    :style="{ backgroundColor: bgColor }">
                    <h3 class="text-2xl font-semibold mb-4 text-green-500">My Profile</h3>
                    <div class="flex gap-6">
                        <!-- Profile Image Section -->
                        <div class="flex flex-col items-center mt-2">
                            <div class="relative">
                                <img src="../Assets/images/uploads/<?= $user['image'] ?>" 
                                    alt="Profile Image" 
                                    class="w-64 h-80 border border-green-300 shadow-md">
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="flex-1">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-semibold text-xl mb-3">First Name</label>
                                    <div class="w-72 border border-green-300 p-2 rounded-md focus:ring-2 dark:border-primary-darker focus:ring-blue-500"><?= $user['first_name']?></div>
                                        
                                </div>
                                <div>
                                    <label class="block font-semibold mb-3 text-xl ">Last Name</label>
                                    <div class="w-76 border border-green-300 p-2 rounded-md focus:ring-2 dark:border-primary-darker focus:ring-blue-500"><?= $user['last_name']?></div>
                                        
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block font-semibold mb-1 text-xl ">Email</label>
                                <div class="flex items-center border border-green-300 rounded-md dark:border-primary-darker">
                                    <span class="w-full p-2 focus:ring-2 focus:ring-blue-500 "><?= $user['email']?></span>
                                    <span class="px-2 text-green-600">✔️</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block font-semibold mb-1 text-xl ">Phone</label>
                                <div class="flex items-center border border-green-300 rounded-md dark:border-primary-darker">
                                    <span class="w-full p-2 focus:ring-2 focus:ring-blue-500 "><?= $user['phone_number']?></span>  
                                    <span class="px-2 text-green-600">✔️</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block font-semibold mb-1 text-xl ">Role</label>
                                <div class="flex items-center border border-green-300 rounded-md dark:border-primary-darker">
                                    <span class="w-full p-2 focus:ring-2 focus:ring-blue-500 "><?= $user['role']?></span>  
                                    <span class="px-2 text-green-600">✔️</span>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-4">
                                <a href="/profile/editProfile?id=<?= $user['user_id'] ?>" class="btn bg-green-500 text-white flex ml-auto mt-4 px-4 py-2 rounded-lg hover:opacity-90">Edit</a>
                                <button type="button" class="bg-yellow-500 text-white flex ml-auto mt-4 px-4 py-2 rounded-lg hover:opacity-90" onclick="window.location.href='/Dashboard'"> Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
