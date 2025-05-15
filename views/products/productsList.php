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
            <div class="shadow-lg rounded-lg mb-16 p-6 border-2 border-gray-200 dark:border-primary-darker transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <h2 class="text-left ml-1 text-3xl font-bold mb-6 text-green-500">Products List</h2>
                <div class="flex justify-between flex-col md:flex-row items-center gap-4 mb-6">
                    <a href="/productsList/create">
                        <button class="bg-green-500 hover:bg-green-600 text-white text-xl py-2 px-4 rounded-lg shadow-md transition duration-300">Add Product</button>
                    </a>
                    <div class="flex w-full md:w-auto gap-2 relative">
                        <input type="text" id="searchInput" placeholder="Search products..." required
                            class="w-full md:w-64 px-4 py-2 pl-10 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-green-300 outline-none border-b"
                            oninput="searchProducts()">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <button type="button" onclick="searchProducts()"
                            class="bg-green-500 hover:bg-green-600 text-white text-xl py-2 px-4 rounded-lg shadow-md transition duration-300">
                            Search
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-5">
                    <table id="productsTable" class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-green-500 text-white uppercase text-xs sm:text-sm leading-normal">
                                <th class="py-3 px-6 text-xl text-left">Image</th>
                                <th class="py-3 px-6 text-xl text-left">Product Name</th>
                                <th class="py-3 px-6 text-xl text-left">Price</th>
                                <th class="py-3 px-6 text-xl text-left">Quantity</th>
                                <th class="py-3 px-6 text-xl text-left">
                                    <select name="category-filter" id="category-filter"
                                        class="pr-5 pl-2 border border-green-300 rounded-md transition duration-300 mr-1 bg-green-600"
                                        onchange="filterByCategory(this.value)">
                                        <option value="">All Categories</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            <?php foreach ($products as $product): ?>
                                <tr data-category="<?= $product['category_name']; ?>"
                                    class="duration-200 rounded-lg shadow-md transition bg-white border-b border-green-500">
                                    <td>
                                        <img src="../Assets/images/uploads/<?php echo $product["image"]?>" class="ml-6" alt="" width="40" height="40" style="border-radius: 5px">
                                    </td>
                                    <td class="py-3 px-6 text-xl"><?php echo $product['name']; ?></td>
                                    <td class="py-3 px-6 text-xl"><?php echo $product['price']; ?>$</td>
                                    <td class="py-3 px-6 text-xl"><?php echo $product['stock_quantity']; ?></td>
                                    <td class="py-3 px-6 text-xl"><?php echo $product['category_name']; ?></td>
                                    <td class="flex py-3 px-6 text-xl justify-center relative">
                                        <button onclick="toggleDropdown(<?= $product['product_id'] ?>)" class="p-2 rounded hover:bg-gray-100">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>

                                        <div id="actionDropdown<?= $product['product_id'] ?>" class="icons flex absolute right-8 w-24 bg-white shadow-lg rounded hidden">
                                            <a href="/products/edit?id=<?= $product["product_id"] ?>" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100">
                                                <i class="far fa-edit text-green-600 text-xl"></i> 
                                            </a>
                                            <button onclick="openModal('deleteProductModal<?= $product['product_id'] ?>')" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100 w-full text-left">
                                                <i class="fas fa-trash-alt text-red-600 text-xl"></i> 
                                            </button>
                                            <a href="/pages/details?id=<?= htmlspecialchars($product["product_id"]) ?>" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100">
                                                <i class="far fa-eye text-blue-600 text-xl"></i> 
                                            </a>
                                        </div>

                                    </td>
                                    <div id="deleteProductModal<?= $product["product_id"] ?>"
                                         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                            <h2 class="text-lg text-xl flex justify-center">Delete Product</h2>
                                            <p class="mt-4">Are you sure you want to delete this product?</p>

                                            <div class="mt-6 flex justify-end space-x-2">
                                                <button onclick="closeModal('deleteProductModal<?= $product['product_id'] ?>')"
                                                        class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 transition duration-200">
                                                    Cancel
                                                </button>

                                                <a href="/products/delete?id=<?= $product["product_id"] ?>" 
                                                   class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200 inline-block text-center">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
