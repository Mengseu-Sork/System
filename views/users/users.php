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
<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg p-6 mb-12 border-2 border-gray-200 dark:border-primary-darker transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                 <h2 class="text-left ml-1 text-3xl font-bold mb-6 text-green-500">User List</h2>
                <a href="/user/create" class="bg-green-500 hover:bg-blue-600 text-white text-xl py-2 px-4 rounded-lg shadow-md transition duration-300">
                    Add User
                </a>
                    <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-5">
                        <table class="w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-green-500 text-white uppercase text-xs sm:text-sm leading-normal">
                                    <th class="py-3 px-4 text-xl text-left">Profile</th>
                                    <th class="py-3 px-4 text-xl text-left">First Name</th>
                                    <th class="py-3 px-4 text-xl text-left">Last Name</th>
                                    <th class="py-3 px-6 text-xl text-left">Email</th>
                                    <th class="py-3 px-6 text-xl text-left">Phone</th>
                                    <th class="py-3 px-6 text-xl text-left">Role</th>
                                    <!-- <th class="py-3 px-6 text-left">Active</th> -->
                                    <th class="py-3 px-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                <?php foreach ($users as $index => $user): ?>
                                    <tr class="duration-200 rounded-lg shadow-md transition bg-white border-b border-green-500">
                                        <td class="py-3 px-6 text-center">
                                            <img src="../Assets/images/uploads/<?= $user["image"]?>" alt=""  width="30" height="30" style="border-radius: 10px;"  >
                                        </td>
                                        <td class="py-3 px-4 text-xl"><?= $user['first_name'] ?></td>
                                        <td class="py-3 px-4 text-xl"><?= $user['last_name'] ?></td>
                                        <td class="py-3 px-4 text-xl"><?= $user['email'] ?></td>
                                        <td class="py-3 px-6 text-xl"><?= $user['phone_number'] ?></td>
                                        <td class="py-3 px-6 text-xl "><?= $user['role'] ?></td>
                                        <!-- <td class="py-3 px-6 text-xl">
                                            <?php if ($user['active'] == 1): ?>
                                                <span class="text-green-500 text-xl">Active</span>
                                            <?php else:?>
                                                <span class="text-red-500 text-xl">Inactive</span>
                                            <?php endif; ?>
                                        </td> -->
                                        <td class="py-3 px-2 text-xl text-center relative">
                                            <!-- Toggle Button -->
                                            <button onclick="toggleDropdown(<?= $user['user_id'] ?>)" class="p-2 rounded hover:bg-gray-100">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>

                                            <!-- Action Dropdown -->
                                            <div id="actionDropdown<?= $user['user_id'] ?>" class="icons flex absolute right-4 w-24 bg-white shadow-lg rounded hidden">
                                                <!-- Edit -->
                                                <button onclick="openModal('editUserModal<?= $user['user_id'] ?>')" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100">
                                                    <i class="far fa-edit size text-green-600 text-xl"></i> 
                                                </button>

                                                <!-- Delete -->
                                                <button onclick="openModal('deleteUserModal<?= $user['user_id'] ?>')" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100">
                                                    <i class="fas fa-trash-alt size text-red-600 text-xl"></i> 
                                                </button>

                                                <!-- View -->
                                                <button onclick="openModal('detailUserModal<?= $user['user_id'] ?>')" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100">
                                                    <i class="far fa-eye size text-blue-600 text-xl"></i> 
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

<script>

    function toggleDropdown(id) {
        const dropdown = document.getElementById('actionDropdown' + id);
        dropdown.classList.toggle('hidden');
        // Optional: close other open dropdowns
        document.querySelectorAll('[id^="actionDropdown"]').forEach(el => {
            if (el !== dropdown) el.classList.add('hidden');
        });
    }

    
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    function previewImage(input) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imgPreview = document.getElementById('image-preview');
            imgPreview.src = e.target.result;
            imgPreview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
        }
    }

    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordField = document.getElementById('password');
        var currentType = passwordField.type;
        passwordField.type = currentType === 'password' ? 'text' : 'password';
    });

</script>