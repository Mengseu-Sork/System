<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto custom-scroll">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg p-6 mb-12 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <h2 class="text-3xl font-bold text-green-600 mb-6">Create New User</h2>

                <form action="/users/store" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 text-xl text-gray-700">First Name</label>
                            <input type="text" name="first_name" class="w-full border border-green-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-xl text-gray-700">Last Name</label>
                            <input type="text" name="last_name" class="w-full border border-green-300 p-2 rounded" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block mb-2 text-xl text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full border border-green-300 p-2 rounded" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-xl text-gray-700">Password</label>
                            <input type="password" name="password" class="w-full border border-green-300 p-2 rounded" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block mb-2 text-xl text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" class="w-full border border-green-300 p-2 rounded">
                        </div>
                        <div>
                            <label class="block mb-2 text-xl text-gray-700">Role</label>
                            <select name="role" class="w-full border border-green-300 p-2 rounded" required>
                                <option value="">Select Role</option>
                                <option value="admin">admin</option>
                                <option value="user">user</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="flex flex-col mb-6 mt-4">
                        <label class="block text-gray-600 text-xl mb-1 font-medium mb-2">User Image</label>
                        <div class="border border-green-300 rounded-lg p-4 w-full flex flex-col items-center bg-white border-b ">
                            <input type="file" name="image" id="image" accept="image/*" class="mb-3 cursor-pointer w-full"
                                            onchange="previewImage(this)">
                            <div class="border-dashed border-2 border-green-300 mt-2 rounded-lg p-4 text-center cursor-pointer hover:border-green-500 transition w-full bg-white"
                                            id="drop-zone">
                                <div class="flex flex-col items-center">
                                    <img id="image-preview" src="#" alt="User Image Preview"
                                                    class="w-24 h-24 object-cover rounded hidden">
                                    <h4 class="font-semibold text-sm mt-2">Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-6">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded text-lg text-xl">
                            Create User
                        </button>
                        <a href="/users" class="bg-red-400 hover:bg-red-500 text-white px-6 py-2 rounded text-lg text-xl">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
