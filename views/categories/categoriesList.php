<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto custom-scroll">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg mb-16 p-6 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <h2 class="text-left ml-1 text-3xl font-bold mb-6 text-green-500">Categories List</h2>
                <div class="flex justify-between flex-col md:flex-row items-center gap-4 mb-6">
                    <a href="/categoriesList/create">
                        <button class="bg-green-500 hover:bg-green-600 text-white text-xl py-2 px-4 rounded-lg shadow-md transition duration-300">Add Product</button>
                    </a>
                    <div class="flex w-full md:w-auto gap-2 relative">
                            <input type="text" id="searchInput" placeholder="Search Categories..." required
                                class="w-full md:w-64 px-4 py-2 pl-10 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-green-300 outline-none bg-white dark:bg-darker border-b dark:border-primary-darker"
                                oninput="searchCateories()">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button type="button" onclick="searchCateories()"
                                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                Search
                            </button>
                    </div>
                </div>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-5">
                    <table id="productsTable" class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-green-500 text-white uppercase text-xs sm:text-sm leading-normal">
                                <th class="py-3 px-6 text-xl text-left">Name</th>
                                <th class="py-3 px-2 text-xl text-left">Description</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            <?php foreach ($categories as $Category): ?>
                                <tr class="duration-200 rounded-lg shadow-md transition bg-white border-b border-green-500">
                                    <td class="py-3 px-6 text-xl"><?php echo $Category['name']; ?></td>
                                    <td class="py-3 px-2 text-xl"><?php echo $Category['description']; ?></td>
                                    <td class="flex py-3 px-6 text-xl justify-center relative">
                                        <button onclick="toggleDropdown(<?= $Category['category_id'] ?>)" class="p-2 rounded hover:bg-gray-100">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div id="actionDropdown<?= $Category['category_id'] ?>" class="icons flex absolute right-4 w-26 bg-white shadow-lg rounded hidden">
                                            <a href="/categoriesList/edit?id=<?= $Category["category_id"] ?>" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100">
                                                <i class="far fa-edit text-green-600 text-xl"></i> 
                                            </a>
                                            <button onclick="openModal('deleteCategoryModal<?= $Category['category_id'] ?>')" class="flex items-center px-2 py-1 text-sm hover:bg-gray-100 w-full text-left">
                                                <i class="fas fa-trash-alt text-red-600 text-xl"></i> 
                                            </button>
                                        </div>

                                    </td>
                                    <div id="deleteCategoryModal<?= $Category['category_id'] ?>" 
                                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                            <div class="bg-white p-6 rounded-lg shadow-lg w-100">
                                                <h2 class="text-3xl text-green-500 flex justify-center">Delete Category</h2>
                                                <p class="text-xl mt-4">Are you sure you want to delete this category?</p>

                                                <div class="mt-6 flex justify-end space-x-2">
                                                    <button onclick="closeModal('deleteCategoryModal<?= $Category['category_id'] ?>')"
                                                        class="bg-yellow-500 text-xl text-white px-4 py-2 rounded-lg hover:opacity-90">
                                                        Cancel
                                                    </button>

                                                    <form action="/categoriesList/delete?id=<?= $Category['category_id'] ?>" method="POST">
                                                        <input type="hidden" name="id" value="<?= $Category['category_id'] ?>">
                                                        <button type="submit"
                                                            class="px-4 py-2 text-xl bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200">
                                                            Delete
                                                        </button>
                                                    </form>
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
