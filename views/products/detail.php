<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-4">
            <div class="shadow-lg rounded-lg mb-12 p-6 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <h3 class="text-2xl text-green-500 font-bold mb-4 ml-4">Product Details</h3>
                <div class="flex gap-12 ml-4">
                    
                    <!-- Product Image -->
                    <div class="flex flex-col items-center mt-2">
                        <div class="relative">
                            <img src="/Assets/images/uploads/<?= htmlspecialchars($product['image']) ?>" 
                                 alt="<?= htmlspecialchars($product['name']) ?>" 
                                 class="w-40 h-56 border border-gray-300 shadow-md object-cover">
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label class="block text-xl mb-3">Product Name</label>
                                <div class="w-80 border border-gray-300 p-2 rounded-md bg-gray-100">
                                    <?= htmlspecialchars($product['name']) ?>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xl mb-3">Category</label>
                                <div class="w-80 border border-gray-300 p-2 rounded-md bg-gray-100">
                                    <?= htmlspecialchars($category['name']) ?>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-8 mt-6">
                            <div>
                                <label class="block text-xl mb-2">Price</label>
                                <div class="w-80 border border-gray-300 p-2 rounded-md bg-gray-100">
                                    $ <?= number_format($product['price'], 2) ?>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xl mb-2">Stock Quantity</label>
                                <div class="w-80 border border-gray-300 p-2 rounded-md bg-gray-100">
                                    <?= htmlspecialchars($product['stock_quantity']) ?>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mr-6">
                            <a href="/productsList" class="inline-block bg-yellow-500 text-white mt-6 px-4 py-2 rounded-lg hover:opacity-90">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
