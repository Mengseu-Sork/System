<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto custom-scroll">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg mb-16 p-6 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <h2 class="text-3xl text-green-500 font-bold mb-4">Edit Product</h2>
                <form action="/productsList/update" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <div class="flex w-full gap-6">
                        <div class="w-1/2">
                            <label class="block text-gray-600 text-xl font-medium mb-2">Product Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" class="w-full border border-green-200 p-2 rounded" required>
                        </div>
                        <div class="w-1/2">
                            <label class="block text-gray-600 text-xl font-medium mb-2">Category</label>
                            <select name="category_id" class="w-full border border-green-200 p-2 rounded" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= htmlspecialchars($category['category_id']) ?>" 
                                            <?= $category['category_id'] == $product['category_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="flex w-full gap-6">
                        <div class="w-1/2">
                            <label class="block text-gray-600 text-xl font-medium mb-2">Price</label>
                            <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($product['price']) ?>" class="w-full border border-green-200 p-2 rounded" required>
                        </div>
                        <div class="w-1/2">
                            <label class="block text-gray-600 text-xl font-medium mb-2">Stock Quantity</label>
                            <input type="number" name="stock_quantity" value="<?= htmlspecialchars($product['stock_quantity']) ?>" class="w-full border border-green-200 p-2 rounded" required>
                        </div>
                    </div>

                    <div class="flex flex-col mt-6 mb-4">
                        <label class="text-xl mb-1">Product Image</label>
                        <div class="border border-green-300 rounded-lg p-4 flex flex-col items-center justify-centerbg-white dark:text-light dark:bg-darker border-b dark:border-primary-darker">
                            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)" class="mb-2 w-full border border-green-300  dark:text-light dark:border-primary-darker">
                            <div class="w-24 h-24 flex items-center justify-center border border-green-200 rounded-lg overflow-hidden mt-3">
                                <img id="image-preview" src="<?php echo !empty($product['image']) ? '/Assets/images/uploads/' . $product['image'] : '#'; ?>" alt="Product Image Preview" class="object-cover w-full h-full <?php echo !empty($product['image']) ? '' : 'hidden'; ?>">
                            </div>
                            <p class="text-gray-500 text-sm mt-2">Drag and drop a file to upload</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <button type="submit" class="bg-green-500 text-xl text-white px-4 py-2 rounded hover:bg-green-600">
                            Update
                        </button>
                        <a href="/productsList" class="bg-red-400 text-xl text-white px-4 py-2 rounded hover:bg-red-600">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
