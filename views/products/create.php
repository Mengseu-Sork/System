
<div class="max-w-full m-4 px-8 py-4 bg-white rounded-xl shadow-md">
    <h2 class="text-3xl text-green-500 font-bold mb-4">Create New Product</h2>
    <form action="/productsList/store" method="POST" enctype="multipart/form-data" class="space-y-4 w-full">
        <div class="flex w-full gap-6">
            <div  class="w-1/2 ">
                <label class="block text-gray-600 text-xl mb-1 font-medium mb-2">Product Name</label>
                <input type="text" name="name" class="w-full border border-green-200 p-2 rounded" required>
            </div>
            <div  class="w-1/2 ">
                <label class="block text-gray-600 text-xl mb-1 font-medium mb-2">Category</label>
                <select name="category_id" class="w-full border border-green-200 p-2 rounded" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category['category_id']) ?>">
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        

        <div class="flex w-full gap-6">
            <div  class="w-1/2">
                <label class="block text-gray-600 text-xl mb-1 font-medium mb-2">Price</label>
                <input type="number" name="price" step="0.01" class="w-full border border-green-200 p-2 rounded" required>
            </div>

            <div  class="w-1/2">
                <label class="block text-gray-600 text-xl mb-1 font-medium mb-2">Stock Quantity</label>
                <input type="number" name="stock_quantity" class="w-full border border-green-200 p-2 rounded" required>
            </div>
        </div>

        <!-- Image -->
        <div class="flex flex-col">
            <label class="block text-gray-600 text-xl mb-1 font-medium mb-2">Product Image</label>
            <div class="border border-green-300 rounded-lg p-4 w-full flex flex-col items-center bg-white border-b ">
                <input type="file" name="image" id="image" accept="image/*" class="mb-3 cursor-pointer w-full"
                                onchange="previewImage(this)">
                <div class="border-dashed border-2 border-green-300 mt-2 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500 transition w-full bg-white"
                                id="drop-zone">
                    <div class="flex flex-col items-center">
                        <img id="image-preview" src="#" alt="Product Image Preview"
                                        class="w-24 h-24 object-cover rounded hidden">
                        <h4 class="font-semibold text-sm mt-2">Drag and drop a file to upload</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-6">
            <button type="submit" class="bg-green-500 text-xl text-white px-4 py-2 rounded hover:bg-green-600">
                Create Product
            </button>
            <a href="/productsList" class="bg-red-400 text-xl text-white px-4 py-2 rounded hover:bg-red-600">
                Cancel
            </a>
        </div>
    </form>
</div>
