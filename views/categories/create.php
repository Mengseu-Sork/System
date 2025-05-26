<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto custom-scroll">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg mb-16 p-6 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <h2 class="text-2xl font-bold mb-6 text-green-500">Add New Category</h2>
                <form action="/categoriesList/store" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-xl font-medium text-gray-700 mb-1">Category Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-300 focus:border-green-500">
                    </div>
                    <div>
                        <label class="block text-xl font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-300 focus:border-green-500"></textarea>
                    </div>
                    <div class="flex gap-6">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xl px-6 py-2 rounded-lg shadow-md transition duration-300">
                            Create Category
                        </button>
                        <a href="/categoriesList" class="bg-red-400 text-xl text-white px-4 py-2 rounded hover:bg-red-600">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>